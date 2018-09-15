<?php

namespace Flynt\Components\BlockGallery;
use Timber\Timber;

use Flynt\Features\Components\Component;

add_filter('Flynt/addComponentData?name=BlockGallery', function ($data) {
    add_action('wp_enqueue_scripts', function () {
        Component::enqueueAssets('BlockGallery');
    });
    
    $data['gallery_photos'] = get_field('gallery_photos');

    return $data;
});
