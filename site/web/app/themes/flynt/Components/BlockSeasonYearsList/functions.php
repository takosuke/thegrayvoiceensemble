<?php

namespace Flynt\Components\BlockSeasonYearsList;

use Timber\Timber;
use Flynt\Features\Components\Component;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('BlockSeasonYearsList');
});

add_filter('Flynt/addComponentData?name=BlockSeasonYearsList', function ($data) {
  $data['posts'] = Timber::get_posts([
      'post_type' => 'seasons'
  ]);
  return $data;
}, 10, 2);
