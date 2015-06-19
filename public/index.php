<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once '../src/bootstrap.php';

$app = new Application($config);

// Register providers
$app->register(new Silex\Provider\TwigServiceProvider(), $config['twig.options']);
$app->register(new Silex\Provider\DoctrineServiceProvider(), $config['db.options']);
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->mount('/', new Main\Controllers\IndexController());

$app->mount('/admin', new Admin\Controllers\IndexController());

$app->run();