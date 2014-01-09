<?php

function r($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

$serverName = $_SERVER['SERVER_NAME'];

if (strstr($serverName, 'dev')) {
    define('APPLICATION_ENV', 'development');
} else if (strstr($serverName, 'stage')) {
    define('APPLICATION_ENV', 'staging');
} else {
    define('APPLICATION_ENV', 'production');
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
