<?php

/**
 * Settings
 * ========
 *
 * loggly
 *     enable Enable logging with Loggly
 *     token  The loggly token for this application
 * rollbar
 *     enable                        Enable logging with Rollbar
 *     post_server_item_access_token The rollbar token of this exact type (There are a few)
 *     root                          The root directory of this application, for stack trace purposes
 * file
 *     path   File path where a log file will be created
 */

return [
    'loggly' => [
        'enable' => false,
        'token'  => null,
    ],
    'rollbar' => [
        'enable'                        => false,
        'post_server_item_access_token' => null,
        'root'                          => APPDIR,
    ],
    'file' => [
        'path' => APPDIR.'/logs/app.log'
    ],
];
