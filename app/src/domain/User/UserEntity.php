<?php

namespace Domain\User;

class UserEntity implements \JsonSerializable
{
    public function __construct(
        public readonly string $email,
        public readonly bool $isActive = false,
        public readonly ?string $token = null,
        public readonly ?string $id = null
    ) {}

    public function jsonSerialize(): array
    {
        return [
            "email" => $this->email,
            "isActive" => $this->isActive,
            "token" => $this->token,
            "id" => $this->id
        ];
    }
}