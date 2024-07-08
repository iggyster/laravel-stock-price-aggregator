<?php

namespace Database\Factories;

use App\AlphaVantage\ConfigInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(config(ConfigInterface::CONFIG_SYMBOLS)),
            'open' => fake()->randomFloat(4),
            'high' => fake()->randomFloat(4),
            'low' => fake()->randomFloat(4),
            'price' => fake()->randomFloat(4),
        ];
    }
}
