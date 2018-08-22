<?php

namespace Flynt\Components\NavigationBreadcrumb;

use Flynt\Features\Components\Component;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('NavigationBreadcrumb');
});

add_filter('Flynt/addComponentData?name=NavigationBreadcrumb', function ($data) {

    return $data;
});
