<?php

namespace Main\Controllers;

use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class IndexController
 * @package Main\Controllers
 * @author Sander Krause <sanderkrause@gmail.com>
 */
class IndexController implements ControllerProviderInterface {

    /**
     * {@inheritDoc}
     * @param \Silex\Application $app
     * @return ControllerCollection
     */
    public function connect(Application $app)
    {
        /** @var ControllerCollection $controllers */
        $controllers = $app['controllers_factory'];
        // Default
        $controllers->get('/', array($this, 'index'))->bind('index');
        // Example GET parameters output by JSON
        $controllers->get('/get', array($this, 'get'))->bind('get');
        // Example POST match and parameters output by JSON
        $controllers->match('/post', array($this, 'post'))->method('POST|GET')->bind('post');
        // Alternatively: $controllers->post(...);
        // Example URL parameters
        $controllers->get('/{name}', array($this, 'name'))->bind('hello');

        return $controllers;
    }

    /**
     * @param \Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index(\Application $app) {
        return $app->redirect($app->path('hello', array('name' => 'World')));
    }

    /**
     * @param \Application $app
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function name(\Application $app, $name) {
        return $app->render('index.twig', array('name' => $name));
    }

    /**
     * @param \Application $app
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Doctrine\DBAL\DBALException
     */
    public function get(\Application $app) {
        $statement = $app->doctrine()->prepare("SHOW DATABASES");
        $statement->execute();
        return $app->json($statement->fetchAll(\PDO::FETCH_COLUMN));
    }

    /**
     * @param \Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function post(\Application $app, Request $request) {
        return $app->json($request->request->all());
    }
}

