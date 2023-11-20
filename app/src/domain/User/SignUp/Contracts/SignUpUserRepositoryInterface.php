<?php

namespace Domain\User\SignUp\Contracts;

use Domain\User\UserEntity;

interface SignUpUserRepositoryInterface
{
    public function create(UserEntity $newUser): UserEntity;
}