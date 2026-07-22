<?php

use Bookstack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use BookStack\Theming\ThemeViews;

require_once __DIR__ . '/authProvider.php';

Theme::listen(ThemeEvents::THEME_REGISTER_VIEWS, function (ThemeViews $views) {
    $views->renderBefore("layouts.parts.custom-head", "layouts.parts.custom-style");
});

Theme::addSocialDriver(
    'vatger',
    [
        'client_id' => '1478',
        'client_secret' => '7uLuEXGVVC9mitXHEBIq6jttWU6jOEDeJ0wTBug1',
        'name' => 'Vatger Connect',
        'auto_register' => true,
        'auto_confirm' => true,
    ],
    \Vatger\AuthProvider\ExtendSocialite::class . '@handle'
);
