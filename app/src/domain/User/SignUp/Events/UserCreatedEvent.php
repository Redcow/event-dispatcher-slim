<?php

namespace Domain\User\SignUp\Events;

use Domain\Abstraction\Event\Event;
use Domain\User\UserEntity;

class UserCreatedEvent extends Event
{
    public function __construct(private UserEntity $user) {}

    public function getObject(): UserEntity
    {
        return $this->user;
    }
}