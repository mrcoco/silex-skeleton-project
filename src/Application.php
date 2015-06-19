<?php

use Silex\Application as SilexApplication;

class Application extends SilexApplication {

	use SilexApplication\UrlGeneratorTrait;

    /**
     * @return Silex\ControllerCollection
     */
    public function controllerFactory() {
        return $this['controllers_factory'];
    }

    /**
     * @return \Symfony\Bridge\Twig\TwigEngine
     */
    public function twig() {
        return $this['twig'];
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function doctrine() {
        return $this['db'];
    }
}