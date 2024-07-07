<?php

namespace App\Providers;

use App\AlphaVantage\Cache\CacheInterface;
use App\AlphaVantage\ConfigInterface;
use App\AlphaVantage\Http\Api\CoreStockClient;
use App\AlphaVantage\Http\Api\CoreStockClientInterface;
use App\AlphaVantage\Http\Api\ParametersInterface;
use App\AlphaVantage\Http\HttpClientInterface;
use App\AlphaVantage\Mapper\Mapper;
use App\AlphaVantage\Mapper\MapperInterface;
use App\AlphaVantage\Service\StockService;
use App\AlphaVantage\Service\StockServiceCached;
use App\AlphaVantage\Service\StockServiceInterface;
use App\Cache\AlphaVantageCacheAdapter;
use App\Http\Client\Adapter\AlphaVantageAdapter;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AlphaVantageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->createAlphaVantageHttpMacros();
    }

    public function register(): void
    {
        $this->app->singleton(HttpClientInterface::class, AlphaVantageAdapter::class);
        $this->app->singleton(MapperInterface::class, Mapper::class);
        $this->app->singleton(CacheInterface::class, AlphaVantageCacheAdapter::class);
        $this->app->singleton(
            CoreStockClientInterface::class,
            static fn(Application $app) => new CoreStockClient($app->make(AlphaVantageAdapter::class))
        );
        $this->app->singleton(
            StockServiceInterface::class,
            static fn(Application $app) => new StockService(
                $app->make(CoreStockClientInterface::class),
                $app->make(MapperInterface::class)
            )
        );
        $this->app->extend(
            StockService::class,
            static fn(StockService $service, Application $app) => new StockServiceCached(
                $service,
                $app->make(MapperInterface::class),
                $app->make(CacheInterface::class)
            )
        );
    }

    private function createAlphaVantageHttpMacros(): void
    {
        Http::macro(
            HttpClientInterface::MACRO_NAME,
            fn() => Http::baseUrl(config(ConfigInterface::CONFIG_URL))
                ->withQueryParameters([
                    ParametersInterface::API_KEY => config(ConfigInterface::CONFIG_API_KEY)
                ])
        );
    }
}
