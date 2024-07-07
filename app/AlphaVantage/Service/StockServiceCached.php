<?php

namespace App\AlphaVantage\Service;

use App\AlphaVantage\Cache\CacheInterface;
use App\AlphaVantage\Mapper\MapperInterface;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

readonly class StockServiceCached implements StockServiceInterface
{
    public function __construct(
        private StockServiceInterface $stockService,
        private MapperInterface $mapper,
        private CacheInterface $cache,
    ) {
    }

    public function fetchStockDataBySymbol(Symbol $symbol): Stock
    {
        $cache = $this->cache->getStock($symbol);
        if (null !== $cache) {
            return $cache;
        }

        return $this->cacheStock($symbol);
    }

    public function fetchStockData(array $symbols): array
    {
        $keys = $this->mapper->mapSymbolsToCacheKeys($symbols);
        $cache = $this->cache->getManyStocks($keys);
        if (empty($cache)) {
            $stocks = $this->stockService->fetchStockData($symbols);

            return $this->cache->putManyStocks($keys, $stocks);
        }

        foreach ($cache as $key => &$stock) {
            if (null !== $stock) {
                continue;
            }

            $stock = $this->cacheStock($this->mapper->mapStringToSymbol($key));
        }

        return $cache;
    }

    private function cacheStock(Symbol $symbol): Stock
    {
        $stock = $this->stockService->fetchStockDataBySymbol($symbol);

        return $this->cache->putStock($symbol, $stock);
    }
}
