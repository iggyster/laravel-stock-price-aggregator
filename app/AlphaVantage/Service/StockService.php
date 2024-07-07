<?php

namespace App\AlphaVantage\Service;

use App\AlphaVantage\Http\Api\CoreStockClientInterface;
use App\AlphaVantage\Mapper\MapperInterface;
use App\AlphaVantage\Value\GlobalQuote;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

readonly class StockService implements StockServiceInterface
{
    public function __construct(
        private CoreStockClientInterface $client,
        private MapperInterface $mapper,
    ) {
    }

    public function fetchStockDataBySymbol(Symbol $symbol): Stock
    {
        $globalQuote = $this->client->fetchGlobalQuote($symbol->getName());

        // TODO: Fix the next line from failing by solving a rate limiting issue for 25 req/day

        return $this->mapper->mapGlobalQuoteToStock($globalQuote[GlobalQuote::KEY]);
    }

    public function fetchStockData(array $symbols): array
    {
        $result = [];
        foreach ($symbols as $rawSymbol) {
            $result[] = $this->fetchStockDataBySymbol($rawSymbol);
        }

        return $result;
    }
}
