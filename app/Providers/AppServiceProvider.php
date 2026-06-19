<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS untuk ngrok dan production
        if ($this->app->environment('production') || $this->app->environment('local')) {
            if (str_contains(env('APP_URL', ''), 'ngrok')) {
                URL::forceScheme('https');
            }
        }
    }
}
