<?php

namespace Bootstrap;

use DI\Container;
use Slim\App;
use Slim\Interfaces\RouteParserInterface;

function register(App $app, string $path): void
{
    (require $path)($app);
}

function addRoutes(App $app, Container $container): void
{

    // user routes
    register($app, __DIR__ . '/../infrastructure/User/Route/UserRoutes.php');

    $app->addRoutingMiddleware();
    $app->addErrorMiddleware(true, true, true);

    $container->set(RouteParserInterface::class, $app->getRouteCollector()->getRouteParser());
}