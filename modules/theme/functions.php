<?php

use Bookstack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use BookStack\Theming\ThemeViews;

Theme::listen(ThemeEvents::THEME_REGISTER_VIEWS, function (ThemeViews $views) {
    $views->renderBefore("layouts.parts.custom-head", "layouts.parts.custom-style");
});
