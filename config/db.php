<?php

/**
 * Settings
 * ========
 *
 * driver    The database driver to be used
 * charset   The character set to be used
 * socket    Custom socket to be used for connections (false to use default)
 * database  Name of the database
 * username  Database username
 * password  Database user's password
 * hostname  The location of the database host (Usually localhost when not on production)
 * port      The port of the database host (Default MySQL port is 3306)
 */

return [
    'driver'   => 'Pdo_Mysql',
    'charset'  => 'utf-8',
    'socket'   => false,
    'database' => null,
    'username' => null,
    'password' => null,
    'hostname' => null,
    'port'     => null,
];
