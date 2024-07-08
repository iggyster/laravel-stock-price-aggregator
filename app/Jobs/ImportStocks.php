<?php

namespace App\Jobs;

use App\AlphaVantage\ConfigInterface;
use App\AlphaVantage\Mapper\MapperInterface;
use App\AlphaVantage\Repository\RepositoryInterface;
use App\AlphaVantage\Service\StockServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Queue\SerializesModels;

final class ImportStocks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function handle(
        StockServiceInterface $stockService,
        MapperInterface $mapper,
        RepositoryInterface $repository
    ): void {
        $configSymbols = config(ConfigInterface::CONFIG_SYMBOLS, []);

        $symbols = [];
        foreach ($configSymbols as $symbol) {
            $symbols[] = $mapper->mapStringToSymbol($symbol);
        }

        try {
            $stocks = $stockService->fetchStockData($symbols);
        } catch (\Throwable $exception) {
            report($exception);

            return;
        }

        $repository->saveStocks($stocks);
    }

    public function middleware(): array
    {
        return [
            new RateLimited('import-stocks'),
        ];
    }
}
