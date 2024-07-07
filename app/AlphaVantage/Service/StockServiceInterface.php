<?php

namespace App\AlphaVantage\Service;

use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

interface StockServiceInterface
{
    public function fetchStockDataBySymbol(Symbol $symbol): Stock;

    /**
     * @param Symbol[] $symbols
     *
     * @return Stock[]
     */
    public function fetchStockData(array $symbols): array;
}
