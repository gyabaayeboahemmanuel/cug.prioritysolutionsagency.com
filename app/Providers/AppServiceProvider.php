<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        // Ensure the user is authenticated
    View::composer('*', function ($view) {
        if (auth()->check()) {
            $user = auth()->user();
            
            $view->with('pd', $user->personaldetails ?? null);
            $view->with('cd', $user->contactdetails ?? null);
            $view->with('fd', $user->familydetails ?? null);
            $view->with('pgd', $user->programdetails ?? null);
            $view->with('ad', $user->academicdetails ?? null);
            $view->with('td', $user->tertiarydetails ?? null);
            $view->with('at', $user->attacheddocuments ?? null);
        }
    });
    }
}
