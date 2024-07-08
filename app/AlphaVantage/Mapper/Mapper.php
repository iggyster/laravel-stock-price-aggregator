<?php

declare(strict_types=1);

namespace App\AlphaVantage\Mapper;

use App\AlphaVantage\Value\GlobalQuote;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;

class Mapper implements MapperInterface
{
    public function mapGlobalQuoteToStock(array $globalQuote): Stock
    {
        $stock = new Stock();
        $stock->setName($globalQuote[GlobalQuote::SYMBOL]);
        $stock->setOpen($globalQuote[GlobalQuote::OPEN]);
        $stock->setHigh($globalQuote[GlobalQuote::HIGH]);
        $stock->setLow($globalQuote[GlobalQuote::LOW]);
        $stock->setPrice($globalQuote[GlobalQuote::PRICE]);

        return $stock;
    }

    public function mapStringToSymbol(string $symbol): Symbol
    {
        return (new Symbol())->setName($symbol);
    }

    public function mapSymbolsToCacheKeys(array $symbols): array
    {
        return \array_map(fn(Symbol $symbol) => $symbol->getName(), $symbols);
    }
}
