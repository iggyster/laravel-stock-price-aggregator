<?php

namespace App\Repository;

use App\AlphaVantage\Repository\RepositoryInterface;
use App\Models\Stock as StockModel;

class AlphaVantageRepository implements RepositoryInterface
{
    public const int LATEST_LIMIT = 10;

    public function fetchLatest(): array
    {
        $stocks = StockModel::orderBy('date', 'DESC')
            ->groupBy(['id', 'name'])
            ->limit(self::LATEST_LIMIT)
            ->get();

        return $stocks->toArray();
    }

    public function saveStocks(array $stocks): void
    {
        foreach ($stocks as $stock) {
            StockModel::updateOrCreate(['name' => $stock->getName(), 'date' => now()], [
                'name' => $stock->getName(),
                'open' => $stock->getOpen(),
                'high' => $stock->getHigh(),
                'low' => $stock->getLow(),
                'price' => $stock->getPrice(),
            ]);
        }
    }

    public function fetchReports(): array
    {
        return [];
    }
}
