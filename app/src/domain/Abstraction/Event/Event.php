<?php

namespace Domain\Abstraction\Event;

use Psr\EventDispatcher\StoppableEventInterface;

class Event implements StoppableEventInterface
{
    private bool $propagationStop = false;

    public function isPropagationStopped(): bool
    {
        return $this->propagationStop;
    }

    public function stopPropagation(): void
    {
        $this->propagationStop = true;
    }
}