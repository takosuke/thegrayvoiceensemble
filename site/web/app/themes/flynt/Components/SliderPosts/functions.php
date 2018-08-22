<?php

namespace Flynt\Components\SliderPosts;

use Timber\Timber;
use Flynt\Features\Components\Component;
use Flynt\Features\Acf\OptionPages;
use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=SliderPosts', function ($data) {

    // Global Icons
    $data['globalIcons'] = Asset::requireUrl('Components/DocumentDefault/Assets/symbol-defs.svg');
    $sliderPostCount = OptionPages::get('globalOptions', 'component', 'SliderPosts', 'sliderPostCount');


    $data['posts'] = Timber::get_posts([
        'post_type' => 'post',
        'posts_per_page' => $sliderPostCount
    ]);

    return $data;
}, 10, 2);

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('SliderPosts', [
        [
            'name' => 'slick-carousel',
            'path' => 'vendor/slick.js',
            'type' => 'script'
        ],
        [
            'name' => 'slick-carousel',
            'path' => 'vendor/slick.css',
            'type' => 'style'
        ]
    ]);
});
