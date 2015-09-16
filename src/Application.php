<?php

use Silex\Application as SilexApplication;

/**
 * Class Application
 * @author Sander Krause <sanderkrause@gmail.com>
 */
class Application extends SilexApplication {

	use SilexApplication\UrlGeneratorTrait;
    use SilexApplication\TwigTrait;

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function doctrine() {
        return $this['db'];
    }
}