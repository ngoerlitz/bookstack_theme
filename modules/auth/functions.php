<?php

use Bookstack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use BookStack\Theming\ThemeViews;
use Illuminate\Support\Facades\Route;
use Vatger\Auth\Controller\WelcomeController;
use Vatger\Auth\Provider\VatsimAuthProvider;
use Vatger\Auth\Provider\IAuthProvider;

require_once __DIR__ . '/src/loader.php';

Theme::listen(ThemeEvents::THEME_REGISTER_VIEWS, function (ThemeViews $views) {
    if (getenv("HIDE_WELCOME") != "true") {
        $views->renderBefore('shelves.parts.list', 'content.welcome');
        $views->renderBefore('books.parts.list', 'content.welcome');
    }
});

Theme::listen(ThemeEvents::APP_BOOT, function () {
    registerRoutes();
});

function registerRoutes(): void
{
    Route::prefix('/vatger')->middleware(['web'])->group(function () {
        Route::prefix('/oauth')
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

        Route::middleware(['auth'])->group(function () {
            Route::post("/welcome", [WelcomeController::class, 'handleWelcome']);
        });
    });
}
