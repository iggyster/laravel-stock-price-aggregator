<?php

namespace Tests\Unit\AlphaVantage\Service;

use App\AlphaVantage\Exception\AlphaVantageException;
use App\AlphaVantage\Http\Api\CoreStockClientInterface;
use App\AlphaVantage\Mapper\MapperInterface;
use App\AlphaVantage\Service\StockService;
use App\AlphaVantage\Value\GlobalQuote;
use App\AlphaVantage\Value\Stock;
use App\AlphaVantage\Value\Symbol;
use Generator;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StockServiceTest extends TestCase
{
    protected MockInterface $client;
    protected MockInterface $mapper;
    protected StockService $service;

    protected function setUp(): void
    {
        $this->client = Mockery::mock(CoreStockClientInterface::class);
        $this->mapper = Mockery::mock(MapperInterface::class);
        $this->service = new StockService($this->client, $this->mapper);
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Service')]
    #[DataProvider('stockDataProvider')]
    public function fetchesStockDataBySymbolSuccessfully($symbolName, $globalQuote, $expectedStock)
    {
        $symbol = (new Symbol())->setName($symbolName);
        $stock = (new Stock())
            ->setName($expectedStock['name'])
            ->setPrice($expectedStock['price']);

        $this->client->shouldReceive('fetchGlobalQuote')->with($symbolName)->andReturn($globalQuote);
        $this->mapper->shouldReceive('mapGlobalQuoteToStock')->with($globalQuote[GlobalQuote::KEY])->andReturn($stock);

        $result = $this->service->fetchStockDataBySymbol($symbol);

        $this->assertEquals($stock, $result);
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Service')]
    public function throwsExceptionWhenGlobalQuoteIsEmpty()
    {
        $this->expectException(AlphaVantageException::class);
        $this->expectExceptionMessage('Unable to fetch global quote.');

        $symbol = (new Symbol())->setName('AAPL');
        $globalQuote = [];

        $this->client->shouldReceive('fetchGlobalQuote')->with('AAPL')->andReturn($globalQuote);

        $this->service->fetchStockDataBySymbol($symbol);
    }

    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Service')]
    public function throwsExceptionWhenGlobalQuoteKeyIsMissing()
    {
        $this->expectException(AlphaVantageException::class);
        $this->expectExceptionMessage('Unable to fetch global quote.');

        $symbol = (new Symbol())->setName('AAPL');
        $globalQuote = ['some_other_key' => ['price' => 150.00]];

        $this->client->shouldReceive('fetchGlobalQuote')->with('AAPL')->andReturn($globalQuote);

        $this->service->fetchStockDataBySymbol($symbol);
    }

    public static function stockDataProvider(): Generator
    {
        yield 'AAPL' => [
            'AAPL',
            [GlobalQuote::KEY => ['price' => 150.00]],
            ['name' => 'AAPL', 'price' => '150.00'],
        ];

        yield 'GOOGL' => [
            'GOOGL',
            [GlobalQuote::KEY => ['price' => 2800.00]],
            ['name' => 'GOOGL', 'price' => '2800.00'],
        ];
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
