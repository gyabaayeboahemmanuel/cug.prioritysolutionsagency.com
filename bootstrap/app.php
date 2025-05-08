<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\TrackGoogleReferrals;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Alias the Middleware
        $middleware->alias([
            'google-referral' => TrackGoogleReferrals::class,
        ]);

        // Apply it globally (if you want it everywhere)
        $middleware->web('google-referral');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
