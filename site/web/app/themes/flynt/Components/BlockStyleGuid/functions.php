<?php

namespace Flynt\Components\BlockStyleGuid;

use Flynt\Features\Components\Component;

add_filter('Flynt/addComponentData?name=BlockStyleGuid', function ($data) {
    add_action('wp_enqueue_scripts', function () {
        Component::enqueueAssets('BlockStyleGuid');
    });
    $data['colors'] = [
        [
            'name' => '$globalColorBackground'
        ],
        [
            'name' => '$globalColorBrand'
        ],
        [
            'name' => '$globalColorHeadline'
        ],
        [
            'name' => '$globalColorText'
        ],
        [
            'name' => '$globalColorLink'
        ]
    ];
    $data['fonts'] = [
        [
            'name' => '$globalFontPrimary'
        ]
    ];
    return $data;
});
