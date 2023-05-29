<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')->prefix('api')->group(function () {
                $this->mapAuthApiRoutes()
                    ->mapCategoriesApiRoutes()
                    ->mapQuotesApiRoutes();
            });
        });
    }

    private function mapAuthApiRoutes(): self
    {
        Route::prefix('auth')->group(base_path('routes/api/auth.php'));
        return $this;
    }

    private function mapCategoriesApiRoutes(): self
    {
        Route::prefix('categories')->group(base_path('routes/api/categories.php'));
        return $this;
    }

    private function mapQuotesApiRoutes(): self
    {
        Route::prefix('quotes')->group(base_path('routes/api/quotes.php'));
        return $this;
    }
}
