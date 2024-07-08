<?php

namespace App\AlphaVantage\Service;

use App\AlphaVantage\Exception\AlphaVantageException;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

interface StockServiceInterface
{
    /**
     * @throws AlphaVantageException
     */
    public function fetchStockDataBySymbol(Symbol $symbol): Stock;

    /**
     * @param Symbol[] $symbols
     *
     * @return Stock[]
     *
     * @throws AlphaVantageException
     */
    public function fetchStockData(array $symbols): array;
}
