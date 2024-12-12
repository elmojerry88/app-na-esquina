<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;


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
        Vite::prefetch(concurrency: 3);

        Response::macro('jsonOrView', function ($view, $data, $status = 200) {
            $request = request();
            
            if ($request->expectsJson()) {
                return response()->json($data, $status);
            }

            return Inertia::render($view, $data);
        });
    }
}