<?php

// Constants
define('APP_ROOT', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR);
define('CONFIG_DIR', APP_ROOT . 'config' . DIRECTORY_SEPARATOR);

define('ENV_DEVELOPMENT', 'development');
define('ENV_CLI', 'cli');
define('ENV_PRODUCTION', 'production');

if (!empty($_SERVER['SERVER_NAME'])) {
    switch ($_SERVER['SERVER_NAME']) {
        case '127.0.0.1':
        case 'localhost':
        case 'silex.home.kompjoefriek.nl':
            $environment = ENV_DEVELOPMENT;
            break;
        default:
            // Production / live
            $environment = ENV_PRODUCTION;
    }
    define('APP_ENVIRONMENT', $environment);
}
else {
    define('APP_ENVIRONMENT', ENV_CLI);
}

// Load basic configuration
require_once CONFIG_DIR . 'default.php';

// Override with environment configuration
if (is_readable(CONFIG_DIR . APP_ENVIRONMENT . '.php')) {
    require_once(CONFIG_DIR . APP_ENVIRONMENT . '.php');
    $config = array_merge($config, $environment_config);
}