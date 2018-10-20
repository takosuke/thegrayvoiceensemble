<?php

namespace Flynt\Components\GridHomeLayout;

use Flynt\Features\Components\Component;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=GridHomeLayout', function ($data) {
    add_action('wp_enqueue_scripts', function () {
        Component::enqueueAssets('GridHomeLayout');
    });

  $data['posts'] = Timber::get_posts([
      'post_type' => 'seasons',
      'orderby' => 'meta_value_num',
      'meta_key' => 'year',
      'order' => 'DESC'
  ]);
  $years = [];
   foreach ($data['posts'] as $key ) {
    array_push($years, substr($key->year, 0, 4));
  }

  $data['counts'] = array_count_values($years);

    return $data;
});
