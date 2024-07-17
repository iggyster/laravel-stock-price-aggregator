<?php

namespace App\Http\Client\RateLimiter;

use App\AlphaVantage\ConfigInterface as AlphaVantage;
use App\AlphaVantage\RateLimiter\RateLimiterInterface;
use Illuminate\Support\Facades\RateLimiter;

class AlphaVantageRateLimiter implements RateLimiterInterface
{
    public function attempt(): mixed
    {
        return RateLimiter::attempt(
            config(AlphaVantage::CONFIG_RATE_LIMITER_KEY),
            config(AlphaVantage::CONFIG_RATE_LIMITER_ATTEMPTS),
            function () {},
            config(AlphaVantage::CONFIG_RATE_LIMITER_DECAY_RATE)
        );
    }
}
