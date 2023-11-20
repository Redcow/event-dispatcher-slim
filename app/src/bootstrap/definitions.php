<?php

namespace Bootstrap;

use DI;
use Domain\Notification\UrlGeneratorInterface;
use Domain\User\SignUp\Contracts\SignUpUserRepositoryInterface;
use Infrastructure\Services\UrlGeneratorService;
use Infrastructure\User\Repository\UserRepository;

function getServiceContainer(): Di\Container
{
    return new DI\Container([
        SignUpUserRepositoryInterface::class => DI\autowire(UserRepository::class),
        UrlGeneratorInterface::class => DI\autowire(UrlGeneratorService::class)
    ]);
}