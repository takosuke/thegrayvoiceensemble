<?php

namespace Flynt\Features\GetTweets;

require_once __DIR__ . '/GetTweets.php';
require_once __DIR__ . '/TwitterAPIExchange.php';

use Flynt\Features\GetTweets\GetTweets;
use Flynt\Utils\Feature;
use Flynt\Features\Acf\OptionPages;

add_action('init', 'Flynt\Features\GetTweets\init');

function init()
{
    $GetTweetsOptions = OptionPages::get('globalOptions', 'feature', 'GetTweets');
    if ($GetTweetsOptions) {
        new GetTweets($GetTweetsOptions);
    }
}
