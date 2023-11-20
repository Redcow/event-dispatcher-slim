<?php

namespace Domain\User\SignUp;

class SignUpUserInput
{
    public function __construct(
       public readonly string $mailAddress,
        public readonly string $password
    ) {}
}