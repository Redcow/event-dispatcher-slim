<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

use function Bootstrap\addListeners;
use function Bootstrap\addRoutes;
use function Bootstrap\getServiceContainer;

$container = getServiceContainer();

AppFactory::setContainer(
    $container
);

$app = AppFactory::create();

addListeners($container);

addRoutes($app, $container);

$app->run();
