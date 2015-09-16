<?php

$config = [
    'debug' => false,
    'twig.options' => [
        'twig.path' => [APP_ROOT . 'views'],
    ],
    'db.options' => [
        'db.options' => [
            'driver'   => 'pdo_mysql',
            'dbname' => 'test',
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'myuser',
            'password' => 'mypass'
        ],
    ]
];
