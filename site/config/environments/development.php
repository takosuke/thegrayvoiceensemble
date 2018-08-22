<?php
/** Development */
define('SAVEQUERIES', true);
define('WP_DEBUG', true);
define('SCRIPT_DEBUG', true);
/**
 * Environments for WP Stage Switcher plugin
 */
$envs = [
  'development' => 'http://example.dev',
  'staging'     => 'http://staging.example.com',
  'production'  => 'http://example.com'
];
define('ENVIRONMENTS', serialize($envs));