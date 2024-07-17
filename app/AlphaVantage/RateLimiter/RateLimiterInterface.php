<?php

namespace App\AlphaVantage\RateLimiter;

interface RateLimiterInterface
{
    public function attempt(): mixed;
}
