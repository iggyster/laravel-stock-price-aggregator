<?php

declare(strict_types=1);

namespace Tests\Unit\AlphaVantage\Value;

use App\AlphaVantage\Value\Stock;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
{
    public static function stockDataProvider(): Generator
    {
        yield ['AAPL'];
        yield ['GOOGL'];
        yield ['MSFT'];
    }

    public static function priceDataProvider(): Generator
    {
        yield ['150.00'];
        yield ['155.00'];
        yield ['145.00'];
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Value')]
    #[DataProvider('stockDataProvider')]
    public function setNameAndGetName(string $stockName): void
    {
        $stock = new Stock();

        $stock->setName($stockName);

        $this->assertEquals($stockName, $stock->getName());
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Value')]
    #[DataProvider('priceDataProvider')]
    public function setOpenAndGetOpen(string $price): void
    {
        $stock = new Stock();

        $stock->setOpen($price);

        $this->assertEquals($price, $stock->getOpen());
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Value')]
    #[DataProvider('priceDataProvider')]
    public function setHighAndGetHigh(string $price): void
    {
        $stock = new Stock();

        $stock->setHigh($price);

        $this->assertEquals($price, $stock->getHigh());
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Value')]
    #[DataProvider('priceDataProvider')]
    public function setLowAndGetLow(string $price): void
    {
        $stock = new Stock();

        $stock->setLow($price);

        $this->assertEquals($price, $stock->getLow());
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Value')]
    #[DataProvider('priceDataProvider')]
    public function setPriceAndGetPrice(string $price): void
    {
        $stock = new Stock();

        $stock->setPrice($price);

        $this->assertEquals($price, $stock->getPrice());
    }
}
