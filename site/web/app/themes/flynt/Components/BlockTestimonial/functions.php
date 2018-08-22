<?php

namespace Flynt\Components\BlockTestimonial;

use Flynt\Features\Components\Component;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('BlockTestimonial');
});

add_filter('Flynt/addComponentData?name=BlockTestimonial', function ($data) {

    return $data;
});
