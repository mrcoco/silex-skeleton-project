<?php

namespace Admin\Controllers;

use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Silex\Application;

/**
 * Class IndexController
 * @package Admin\Controllers
 * @author Sander Krause <sanderkrause@gmail.com>
 */
class IndexController implements ControllerProviderInterface {

    /**
     * {@inheritDoc}
     * @param Application $app
     * @return ControllerCollection
     */
    public function connect(Application $app)
    {
        /** @var ControllerCollection $controllers */
        $controllers = $app['controllers_factory'];

        $controllers->get('/', array($this, 'index'));

        return $controllers;
    }

    /**
     * @param \Application $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(\Application $app) {
        return $app->render('admin.twig');
    }
}