<?php

namespace Bootstrap;

use DI;

use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

use Domain\Abstraction\Event\EventDispatcher;
use Domain\Abstraction\Event\ListenerProvider;
use Domain\Notification\User\Listeners\UserCreatedListener;
use Domain\User\SignUp\Events\UserCreatedEvent;


function addListeners(ContainerInterface $container): void
{
    $listenerProvider = new ListenerProvider();

    $listenerProvider->addListener(
        UserCreatedEvent::class,
        function($event) use ($container) {
            echo 'trigger';
            $mailer = $container->get(UserCreatedListener::class);
            $mailer($event);
        }
    );

    $listenerProvider->addListener(
        UserCreatedEvent::class,
        function($event) use ($container) {
            echo 'listener 2';
        }
    );

    $eventDispatcher = new EventDispatcher(
        $listenerProvider
    );

    /** @var DI\Container $container */
    $container->set(EventDispatcherInterface::class, $eventDispatcher);

}