<?php

namespace Flynt\Components\HeroSeasonHeader;

use Flynt\Features\Components\Component;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=HeroSeasonHeader', function ($data) {
    add_action('wp_enqueue_scripts', function () {
        Component::enqueueAssets('HeroSeasonHeader');
    });
    $data['post'] = array(
        'title' => get_the_title(),
        'year' => get_field('year')
    );

    return $data;
});
