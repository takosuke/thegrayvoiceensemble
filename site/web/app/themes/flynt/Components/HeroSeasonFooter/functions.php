<?php

namespace Flynt\Components\HeroSeasonFooter;

use Flynt\Features\Components\Component;

add_filter('Flynt/addComponentData?name=HeroSeasonFooter', function ($data) {
    add_action('wp_enqueue_scripts', function () {
        Component::enqueueAssets('HeroSeasonFooter');
    });
 
    $data['post'] = array(
    	'choir_members' => get_field('choir_members'),
    	'description' => get_field('description')
    	 );
    return $data;
});
