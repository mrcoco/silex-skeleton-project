<?php

namespace Main\Controllers;

use Silex\ControllerProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController implements ControllerProviderInterface {

    public function connect(Application $app)
    {
        if ($app instanceof \Application) {
            $controllers = $app->controllerFactory();
        } else {
            $controllers = $app['controllers_factory'];
            /**
             * @var $controllers \Silex\ControllerCollection
             */
        }
        // Default
        $controllers->get('/', array($this, 'index'))->bind('index');
        // Example GET parameters output by JSON
        $controllers->get('/get', array($this, 'get'))->bind('get');
        // Example POST match and parameters output by JSON
        $controllers->match('/post', array($this, 'post'))->method('POST|GET')->bind('post');
        // Alternatief: $controllers->post(...);
        // Example URL parameters
        $controllers->get('/{name}', array($this, 'name'))->bind('hello');

        return $controllers;
    }

    public function index(\Application $app) {
        //return $app->redirect('/World');
        return $app->redirect($app->path('hello', array('name' => 'World')));
    }

    public function name(\Application $app, $name) {
        return $app->twig()->render('index.twig', array('name' => $name));
    }

    public function get(\Application $app, Request $request) {
        $statement = $app->doctrine()->prepare("SHOW DATABASES");
        $statement->execute();
        var_dump($statement->fetchAll(\PDO::FETCH_COLUMN));
        return $app->json($request->query->all());
    }

    public function post(\Application $app, Request $request) {
        return $app->json($request->request->all());
    }
}

