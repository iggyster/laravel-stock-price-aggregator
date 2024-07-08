<?php

namespace App\Repository;

use App\AlphaVantage\ConfigInterface;
use App\AlphaVantage\Repository\RepositoryInterface;
use Illuminate\Support\Facades\Cache;

readonly class AlphaVantageRepositoryCached implements RepositoryInterface
{
    public const CACHE_KEY = 'latest';

    public function __construct(private RepositoryInterface $repository)
    {
    }

    public function fetchLatest(): array
    {
        return Cache::remember(
            self::CACHE_KEY,
            now()->addMinutes(config(ConfigInterface::CONFIG_CACHE_TTL)),
            fn() => $this->repository->fetchLatest()
        );
    }

    public function saveStocks(array $stocks): void
    {
        $this->repository->saveStocks($stocks);
    }

    public function fetchReports(): array
    {
        return $this->repository->fetchReports();
    }
}
