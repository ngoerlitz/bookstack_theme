<?php

use Bookstack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use Illuminate\Support\Facades\Route;
use Vatger\Auth\Provider\VatsimAuthProvider;
use Vatger\Auth\Provider\IAuthProvider;

require_once __DIR__ . '/src/loader.php';

Theme::listen(ThemeEvents::APP_BOOT, function () {
    registerRoutes();
});

function registerRoutes(): void
{

    Route::middleware(['web'])
        ->prefix('/vatger/oauth')
        ->group(function () {
            /** @var class-string<IAuthProvider> $provider */
            $provider = VatsimAuthProvider::class;

            Route::get("/login", [
                $provider,
                'handleLogin'
            ]);

            Route::get("/callback", [
                $provider,
                'handleCallback'
            ]);
        });
}
