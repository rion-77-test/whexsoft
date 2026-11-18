<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('partials.frontend.footer', function ($view): void {
            $view->with('navServices', Service::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('title')
                ->take(6)
                ->get());
        });
    }
}
