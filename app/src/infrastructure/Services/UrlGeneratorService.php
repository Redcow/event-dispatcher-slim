<?php

namespace Infrastructure\Services;

use Domain\Notification\UrlGeneratorInterface;
use Infrastructure\User\Route\UserRouteNamesEnum;
use Slim\Interfaces\RouteParserInterface;
use Slim\Psr7\Factory\UriFactory;

readonly class UrlGeneratorService implements UrlGeneratorInterface
{

    public function __construct(
        private RouteParserInterface $router
    ) {}

    public function getGoToActiveAccountUrl(string $token): string
    {
        $uri = (new UriFactory())->createFromGlobals($_SERVER);

        xdebug_break();

        return $this->router->fullUrlFor(
            $uri,
            UserRouteNamesEnum::ActivateAccount->value,
            ['token' => $token]
        );
    }
}