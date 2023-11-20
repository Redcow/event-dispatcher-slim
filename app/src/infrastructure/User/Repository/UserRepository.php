<?php

namespace Infrastructure\User\Repository;

use Domain\User\UserEntity;
use Domain\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function create(UserEntity $newUser): UserEntity
    {
        return new UserEntity(
            $newUser->email,
            false,
            "zeofhijezfoifzeoj",
            1
        );
    }
}