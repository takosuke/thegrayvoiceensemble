<?php

namespace Flynt\Components\BlockSearch;

use Flynt\Features\Components\Component;
use Timber\Menu;
use Flynt\Utils\Asset;
use Flynt\Features\Acf\OptionPages;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('BlockSearch');
});

add_filter('Flynt/addComponentData?name=BlockSearch', function ($data) {
    // icons
    $data['icons'] = array(
        'search' => Asset::requireUrl('Components/BlockSearch/Assets/icon-search.svg')
    );

    // search
    $data['searchFormAction'] = home_url('/');
    $data['searchFormQuery'] = get_search_query();

    //var_dump($data['menu']);
    return $data;
});
