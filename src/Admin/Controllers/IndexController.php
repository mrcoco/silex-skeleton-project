<?php

namespace Admin\Controllers;

use Silex\ControllerProviderInterface;
use Silex\Application;

class IndexController implements ControllerProviderInterface {

    public function connect(Application $app)
    {
        if ($app instanceof \Application) {
            $controllers = $app->controllerFactory();
        } else {
            $controllers = $app['controllers_factory'];
        }
        $controllers->get('/', array($this, 'index'));

        return $controllers;
    }

    public function index(\Application $app) {
        return $app->twig()->render('admin.twig');
    }
}