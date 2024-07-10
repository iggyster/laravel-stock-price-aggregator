<?php

namespace App\Repository;

use App\AlphaVantage\Repository\RepositoryInterface;
use App\Models\Stock as StockModel;
use Illuminate\Support\Facades\DB;

class AlphaVantageRepository implements RepositoryInterface
{
    public const int LATEST_LIMIT = 10;

    public function fetchLatest(): array
    {
        $stocks = StockModel::whereIn(
                'id',
                StockModel::query()->selectRaw('max(id)')->groupBy('name')
            )
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
        $reports = DB::table(
            StockModel::selectRaw('
                    name,
                    price AS current_price,
                    LEAD(price, 1) OVER (PARTITION BY name ORDER BY id DESC) AS previous_price,
                    price - LEAD(price, 1) OVER (PARTITION BY name ORDER BY id DESC) AS price_difference,
                    ROW_NUMBER() OVER (PARTITION BY name ORDER BY id DESC) AS rn
                ')
            )
            ->where('rn', '=', '1')
            ->get();

        return $reports
            ->map(fn($item) => [
                'name' => $item->name,
                'current_price' => $item->current_price,
                'previous_price' => $item->previous_price,
                'change' => $item->price_difference * 100 / $item->previous_price,
            ])
            ->toArray();
    }
}
