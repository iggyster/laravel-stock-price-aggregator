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
        $latest = collect($this->fetchLatest())->keyBy('name');

        $preLatest = StockModel::whereIn(
            'id',
            StockModel::query()->selectRaw('max(id)')
                ->whereNotIn('id', StockModel::query()->selectRaw('max(id)')->groupBy('name'))
                ->groupBy('name')
        )->get()->keyBy('name');

        $stocks = collect();
        foreach ($latest as $name => $stock) {
            $preLatestPrice = $preLatest->get($name)['price'];
            $stocks->add([
                'name' => $name,
                'latest_price' => $stock['price'],
                'pre_latest_price' => $preLatestPrice,
                'difference' => ($stock['price'] - $preLatestPrice) / $preLatestPrice * 100,
            ]);
        }

        return $stocks->toArray();
    }
}
