<?php

// Require the composer autoloader
require_once APPDIR.'/vendor/autoload.php';

// Autoload the rest of our application
spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';

    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    if (file_exists(APPDIR.'/src/'.$fileName)) {
        require APPDIR.'/src/'.$fileName;
    }
});

// Create the application object
$app = new Silex\Application;

// Define acceptable environments
$environments = array(
    'production',
    'staging',
    'qa',
    'testing',
    'development',
);

// Detect the current application environment
if (isset($_SERVER['APP_ENV']) && in_array($_SERVER['APP_ENV'], $environments)) {
    $environment = $_SERVER['APP_ENV'];
} else {
    $environment = 'development';
}

// Config is a bit of a special-case service provider and needs to be registered
// before all the others (so that they can access it)
$app->register(new Synapse\Provider\ConfigServiceProvider(), array(
    'config_dirs' => array(
        APPDIR.'/config/',
        APPDIR.'/config/'.$environment.'/',
    ),
));

// Register services
require_once APPDIR.'/services.php';

// Create routes
require_once APPDIR.'/routes.php';

$app->run();
