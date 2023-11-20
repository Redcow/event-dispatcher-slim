<?php

namespace Domain\User\SignUp;

class SignUpUserOutput
{
    private string $message;

    public function setMessage(string $message) {
        $this->message = $message;
    }

    public function getMessage(): string {
        return $this->message;
    }
}