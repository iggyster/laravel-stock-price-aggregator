<?php

declare(strict_types=1);

namespace Tests\Unit\AlphaVantage\Value;

use App\AlphaVantage\Value\Symbol;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class SymbolTest extends TestCase
{
    #[Test]
    #[Group('unit'), Group('AlphaVantage'), Group('Value')]
    #[DataProvider('symbolDataProvider')]
    public function setNameAndGetName(string $symbolName): void
    {
        $symbol = (new Symbol())->setName($symbolName);

        $this->assertInstanceOf(Symbol::class, $symbol);
        $this->assertEquals($symbolName, $symbol->getName());
    }

    public static function symbolDataProvider(): \Generator
    {
        yield ['AAPL'];
        yield ['GOOGL'];
        yield ['MSFT'];
    }
}
