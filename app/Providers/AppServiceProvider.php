<?php

namespace App\Providers;

use App\Views\Composers\MenuComposer;
use Illuminate\Support\ServiceProvider;
use View;

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
        // View::share('menu', [
        //     'Home' => '/',
        //     'About' => '/about',
        //     'Contact' => '/contact',
        // ]);

        View::composer(['*'], MenuComposer::class);

    }
}
