<?php

namespace App\Providers;

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
         \View::composer('partials.footer', function ($view) {
            $footerSettings = \App\Models\FooterSetting::first();
            $footerLinks = \App\Models\FooterLink::active()->ordered()->with('page')->get();

            $view->with(compact('footerSettings', 'footerLinks'));
        });
    }
}
