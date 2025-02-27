<?php

namespace App\AlphaVantage\Service;

use App\AlphaVantage\Exception\AlphaVantageException;
use App\AlphaVantage\Http\Api\CoreStockClientInterface;
use App\AlphaVantage\Mapper\MapperInterface;
use App\AlphaVantage\Value\GlobalQuote;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

readonly class StockService implements StockServiceInterface
{
    private const string MESSAGE_FAILED_GLOBAL_QUOTE = 'Unable to fetch global quote.';

    public function __construct(
        private CoreStockClientInterface $client,
        private MapperInterface $mapper,
    ) {
    }

    public function fetchStockDataBySymbol(Symbol $symbol): Stock
    {
        $globalQuote = $this->client->fetchGlobalQuote($symbol->getName());
        if (empty($globalQuote[GlobalQuote::KEY])) {
            throw new AlphaVantageException(self::MESSAGE_FAILED_GLOBAL_QUOTE);
        }

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
