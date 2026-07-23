<?php

use App\Http\Controllers\MetarController;
use Bookstack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use BookStack\Theming\ThemeViews;

require_once __DIR__ . '/src/metarController.php';

Theme::listen(ThemeEvents::THEME_REGISTER_VIEWS, function (ThemeViews $views) {
    $views->renderBefore("layouts.parts.base-body-end", "layouts.parts.custom-script");
});

Theme::listen(ThemeEvents::APP_BOOT, function () {
    Route::get("/vatger/metar/{icao}", [MetarController::class, 'metar']);
});
