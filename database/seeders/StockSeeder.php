<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public const int SEEDS = 10;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::factory()->count(self::SEEDS)->create();
    }
}
