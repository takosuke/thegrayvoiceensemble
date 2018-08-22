<?php

namespace Flynt\Features\GoogleTagManager;

require_once __DIR__ . '/GoogleTagManager.php';

use Flynt\Features\GoogleTagManager\GoogleTagManager;
use Flynt\Utils\Feature;
use Flynt\Features\Acf\OptionPages;

add_action('init', 'Flynt\Features\GoogleTagManager\init');

function init()
{
    $googleTagManagerOptions = OptionPages::get('globalOptions', 'feature', 'GoogleTagManager');
    if ($googleTagManagerOptions) {
        new GoogleTagManager($googleTagManagerOptions);
    }
}
