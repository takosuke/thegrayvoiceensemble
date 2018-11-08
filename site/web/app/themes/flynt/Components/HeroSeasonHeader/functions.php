<?php

namespace Flynt\Components\HeroSeasonHeader;

use Flynt\Features\Components\Component;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=HeroSeasonHeader', function ($data) {
    add_action('wp_enqueue_scripts', function () {
        Component::enqueueAssets('HeroSeasonHeader');
    });
    $data['post'] = array(
        'year' => get_field('year'),
        'title' => get_field('title'),
        'group_photo' => get_field('group_photo')
    );
    $youtube_video = get_field('youtube_video');
    parse_str( parse_url( $youtube_video, PHP_URL_QUERY ), $my_array_of_vars );
    $data["youtube_video"] = $my_array_of_vars['v'];
    return $data;
});
