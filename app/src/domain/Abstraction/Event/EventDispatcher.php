<?php

namespace Domain\Abstraction\Event;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;

class EventDispatcher implements EventDispatcherInterface
{
    public function __construct(
        private ListenerProviderInterface $listenerProvider,
        //private ContainerInterface $container
    ) {}

    public function dispatch(object $event): object
    {
        if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
            return $event;
        }

        foreach ($this->listenerProvider->getListenersForEvent($event) as $listener)
        {
            //$listener = $this->container->get($listener::class);
            $listener($event);
        }

        return $event;
    }

    public function getListenerProvider(): ListenerProviderInterface
    {
        return $this->listenerProvider;
    }
}