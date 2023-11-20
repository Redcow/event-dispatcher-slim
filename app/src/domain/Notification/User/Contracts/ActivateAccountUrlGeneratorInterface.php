<?php

namespace Domain\Notification\User\Contracts;

interface ActivateAccountUrlGeneratorInterface
{
    public function getGoToActiveAccountUrl ( string $token ): string;
}