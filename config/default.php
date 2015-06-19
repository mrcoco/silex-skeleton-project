<?php

$config = array(
    'debug' => false,
    'twig.options' => array(
        'twig.path' => array(APP_ROOT . 'src' . DIRECTORY_SEPARATOR . 'views'),
        'twig.paths' => array(
            '__main__' => array(APP_ROOT . 'src' . DIRECTORY_SEPARATOR . 'views')
        )
    ),
    'db.options' => array(
        'db.options' => array(
            'driver'   => 'pdo_mysql',
            'dbname' => 'test',
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'myuser',
            'password' => 'mypass'
        ),
    )
);
