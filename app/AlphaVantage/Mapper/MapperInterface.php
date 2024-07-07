<?php

namespace App\AlphaVantage\Mapper;

use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

interface MapperInterface
{
    /**
     * @param array{
     *      "01. symbol": string,
     *      "02. open": string,
     *      "03. high": string,
     *      "04. low": string,
     *      "05. price": string,
     *      "06. volume": string,
     *      "07. latest trading day": string,
     *      "08. previous close": string,
     *      "09. change": string,
     *      "10. change percent": string
     *  } $globalQuote
     */
    public function mapGlobalQuoteToStock(array $globalQuote): Stock;

    public function mapStringToSymbol(string $symbol): Symbol;

    /**
     * @param Symbol[] $symbols
     *
     * @return string[]
     */
    public function mapSymbolsToCacheKeys(array $symbols): array;
}
