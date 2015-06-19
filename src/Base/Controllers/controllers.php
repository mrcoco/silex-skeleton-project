<?php

global $app;

$app->get('/', function (\Application $app) {
    return $app->redirect('/World');
})->bind('index');

$app->get('/{name}', function (\Application $app, $name) {
    return $app->twig()->render('index.twig', array('name' => $name));
})->bind('hello');