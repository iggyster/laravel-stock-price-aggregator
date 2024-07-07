<?php

declare(strict_types=1);

namespace App\Cache;

use App\AlphaVantage\Cache\CacheInterface;
use App\AlphaVantage\ConfigInterface;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;
use Illuminate\Support\Facades\Cache;

class AlphaVantageCacheAdapter implements CacheInterface
{
    public function getStock(Symbol $symbol): ?Stock
    {
        return Cache::get($symbol->getName());
    }

    public function putStock(Symbol $symbol, Stock $stock): Stock
    {
        Cache::put($symbol->getName(), $stock, now()->addMinutes($this->getTtl()));

        return $stock;
    }

    public function getManyStocks(array $keys): array
    {
        return Cache::many($keys);
    }

    public function putManyStocks(array $keys, array $stocks): array
    {
        Cache::putMany(\array_combine($keys, $stocks), now()->addMinutes($this->getTtl()));

        return $stocks;
    }

    private function getTtl(): int
    {
        return config(ConfigInterface::CONFIG_CACHE_TTL);
    }
}
