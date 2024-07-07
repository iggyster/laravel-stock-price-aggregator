<?php

namespace App\AlphaVantage\Cache;

use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

interface CacheInterface
{
    public function getStock(Symbol $symbol): ?Stock;

    public function putStock(Symbol $symbol, Stock $stock): Stock;

    /**
     * @return array<string, Stock|null>
     */
    public function getManyStocks(array $keys): array;

    /**
     * @param string[] $keys
     * @param Stock[] $stocks
     *
     * @return Stock[]
     */
    public function putManyStocks(array $keys, array $stocks): array;
}
