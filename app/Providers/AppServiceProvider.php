<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

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
    public function boot(Request $request): void
    {
        // Percayai proxy Railway
        $request->setTrustedProxies(
            ['*'],
            Request::HEADER_X_FORWARDED_FOR |
            Request::HEADER_X_FORWARDED_HOST |
            Request::HEADER_X_FORWARDED_PORT |
            Request::HEADER_X_FORWARDED_PROTO
        );

        // HANYA paksa HTTPS jika aplikasi berjalan di server production (Railway)
        // Di lokal, ini akan diabaikan sehingga server lokal tetap aman pakai HTTP biasa.
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
