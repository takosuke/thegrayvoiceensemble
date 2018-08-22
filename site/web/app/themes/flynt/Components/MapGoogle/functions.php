<?php

namespace Flynt\Components\MapGoogle;

use Flynt\Features\Components\Component;
use Flynt\Features\Acf\OptionPages;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('MapGoogle');
});

add_filter('Flynt/addComponentData?name=MapGoogle', function ($data) {
    $data['options'] = OptionPages::get('globalOptions', 'feature', 'Acf');
    return $data;
});

