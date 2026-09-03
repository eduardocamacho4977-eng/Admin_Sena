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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });

        Blade::if('instructor', function () {
            return auth()->check() && auth()->user()->isInstructor();
        });

        Blade::if('applicant', function () {
            return auth()->check() && auth()->user()->isApplicant();
        });

        Blade::if('apprentice', function () {
            return auth()->check() && auth()->user()->isApprentice();
        });
    }
}
