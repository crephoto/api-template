<?php

// Register service providers
$app->register(new Synapse\Provider\ConsoleServiceProvider());
$app->register(new Synapse\Provider\ZendDbServiceProvider());
$app->register(new Synapse\Provider\OAuth2ServerServiceProvider());
$app->register(new Synapse\Provider\OAuth2SecurityServiceProvider());
$app->register(new Synapse\Provider\ResqueServiceProvider());
$app->register(new Synapse\Provider\ControllerServiceProvider());
$app->register(new Synapse\Log\ServiceProvider());
$app->register(new Synapse\Email\ServiceProvider());
$app->register(new Synapse\User\ServiceProvider());
$app->register(new JDesrosiers\Silex\Provider\CorsServiceProvider());

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Mustache\Silex\Provider\MustacheServiceProvider, [
    'mustache.path' => APPDIR.'/templates',
    'mustache.options' => [
        'cache' => TMPDIR,
    ],
]);

$app->register(new Synapse\Provider\MigrationUpgradeServiceProvider());

// Register controllers and other shared services
$app['index.controller'] = $app->share(function () use ($app) {
    $index = new \Application\Controller\IndexController(
        new \Application\View\Test($app['mustache'])
    );

    return $index;
});

$app['private.controller'] = $app->share(function () use ($app) {
    $index = new \Application\Controller\PrivateController();

    return $index;
});

$app['rest.controller'] = $app->share(function () use ($app) {
    return new \Application\Controller\RestController;
});

// Register CLI commands
$app['test.command'] = $app->share(function () use ($app) {
    return new \Application\Command\TestCommand;
});

$app->register(new Silex\Provider\SecurityServiceProvider(), [
    'security.firewalls' => [
        'unsecured' => [
            'pattern'   => '^/oauth',
        ],
        'public' => [
            'pattern'   => '^/users$', // Make user creation endpoint public for user registration
            'anonymous' => true,
        ],
        'api' => [
            'pattern'   => '^/',
            // Order of oauth and anonymous matters!
            'oauth'     => true,
            'anonymous' => true,
        ],
    ],
]);
