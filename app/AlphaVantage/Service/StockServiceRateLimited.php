<?php

namespace App\AlphaVantage\Service;

use App\AlphaVantage\Exception\AlphaVantageException;
use App\AlphaVantage\RateLimiter\RateLimiterInterface;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

readonly class StockServiceRateLimited implements StockServiceInterface
{
    private const string MESSAGE_RICH_LIMIT = 'Too many attempts for AlphaVantage API';

    public function __construct(
        private StockServiceInterface $stockService,
        private RateLimiterInterface $rateLimiter,
    ) {
    }

    public function fetchStockDataBySymbol(Symbol $symbol): Stock
    {
        if (!$this->rateLimiter->attempt()) {
            throw new AlphaVantageException(self::MESSAGE_RICH_LIMIT);
        }

        return $this->stockService->fetchStockDataBySymbol($symbol);
    }

    public function fetchStockData(array $symbols): array
    {
        return $this->stockService->fetchStockData($symbols);
    }
}
