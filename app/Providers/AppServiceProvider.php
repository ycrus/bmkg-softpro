<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && config('clockwork.enable')) {
            $this->app->register(\Clockwork\Support\Laravel\ClockworkServiceProvider::class);
        }

        if (!config('clockwork.enable', false)) return;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('rupiah', function ($harga) {
            $float = floatval($harga);
            return 'Rp' . number_format($float, 0, ',', '.');
        });

        if (!config('clockwork.enable', false)) return;
    }
}
