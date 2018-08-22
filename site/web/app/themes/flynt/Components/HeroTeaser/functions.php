<?php

namespace Flynt\Components\HeroTeaser;

use Flynt\Features\Components\Component;
use Flynt\Utils\Asset;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('HeroTeaser');
});

add_filter('Flynt/addComponentData?name=HeroTeaser', function ($data) {
    $data['iconPhone'] = Asset::requireUrl('Components/HeroTeaser/assets/icon-phone.svg');

    return $data;
});
