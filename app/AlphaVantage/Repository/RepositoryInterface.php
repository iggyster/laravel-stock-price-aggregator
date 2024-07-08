<?php

namespace App\AlphaVantage\Repository;

use App\AlphaVantage\Value\Stock;

interface RepositoryInterface
{
    /**
     * @return array<int, mixed>
     */
    public function fetchLatest(): array;

    /**
     * @param Stock[] $stocks
     */
    public function saveStocks(array $stocks): void;

    /**
     * @return array<int, mixed>
     */
    public function fetchReports(): array;
}
