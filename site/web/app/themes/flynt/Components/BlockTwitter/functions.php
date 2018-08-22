<?php

namespace Flynt\Components\BlockTwitter;

use Timber\Timber;
use Flynt\Features\GetTweets\GetTweets;
use Flynt\Features\Acf\OptionPages;
use Flynt\Features\Components\Component;
use Flynt\Utils\Asset;

add_action('wp_enqueue_scripts', function () {
    Component::enqueueAssets('BlockTwitter');
});

add_filter('Flynt/addComponentData?name=BlockTwitter', function ($data) {
    $data['icons'] = array(
        'symbol' => Asset::requireUrl('Components/BlockTwitter/Assets/symbol-defs.svg')
    );


    $GetTweetsOptions = OptionPages::get('globalOptions', 'feature', 'GetTweets');

    if ($GetTweetsOptions) {
        $tweets = new GetTweets($GetTweetsOptions);
        $data['tweets'] = $tweets->getTweets($data['tweets_count'], $data['tweets_name']);
    }


    return $data;
});
