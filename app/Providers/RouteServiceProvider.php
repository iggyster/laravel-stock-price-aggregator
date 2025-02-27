<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for(
            'api',
            fn(Request $request) => Limit::perMinute(60)->by($request->user()?->id ?: $request->ip())
        );

        $this->routes(fn() => Route::middleware('api')->prefix('api')->group(base_path('routes/api.php')));
    }

}
