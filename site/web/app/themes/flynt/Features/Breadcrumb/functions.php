<?php

namespace Flynt\Features\Breadcrumb;

require_once __DIR__ . '/Breadcrumb.php';

use Flynt\Features\Breadcrumb\Breadcrumb;

add_action('breadcrumbNav', 'Flynt\Features\Breadcrumb\breadcrumbNav');

function breadcrumbNav()
{
  Breadcrumb::nav_breadcrumb();
}
