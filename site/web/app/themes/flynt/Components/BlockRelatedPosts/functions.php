<?php

namespace Flynt\Components\BlockRelatedPosts;

use Timber\Timber;
use Flynt\Features\Components\Component;
use Flynt\Utils\Asset;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('BlockRelatedPosts');
});

add_filter('Flynt/addComponentData?name=BlockRelatedPosts', function ($data) {

  // Global Icons
  $data['globalIcons'] = Asset::requireUrl('Components/DocumentDefault/Assets/symbol-defs.svg');

  // get current post id
  $postId = get_the_ID();
  $catId = '';

  // get current post category
  $categories = get_the_category();
  if ($categories):
    foreach( $categories as $category ) {
        $catId = $category->term_id;
    }
  endif;

  // get all posts with the same category of the current post and exclude the current one
  $args = array(
      'post_type' => 'post',
      'category' => $catId,
      'posts_per_page' => $data['posts_count'],
      'post__not_in' => array( $postId )
  );

  $query = !empty($data['query']) ? $data['query'] : false;
  $posts = Timber::get_posts($args);
  if (!empty($posts)) {
      $posts = array_map(function ($post) {
          $fields = get_fields($post->id);
          $post->fields = $fields === false ? [] : $fields;
          return $post;
      }, $posts);
  }
  $context = [
      'posts' => $posts
  ];
  return array_merge($context, $data);

});
