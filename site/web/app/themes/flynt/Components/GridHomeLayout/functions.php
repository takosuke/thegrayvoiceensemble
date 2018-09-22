<?php

namespace Flynt\Components\GridHomeLayout;

use Flynt\Features\Components\Component;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=GridHomeLayout', function ($data) {
    add_action('wp_enqueue_scripts', function () {
        Component::enqueueAssets('GridHomeLayout');
    });

  $data['posts'] = Timber::get_posts([
      'post_type' => 'seasons'
  ]);

    return $data;
});
