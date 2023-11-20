<?php

namespace Domain\User\SignUp;

use Psr\EventDispatcher\EventDispatcherInterface;

use Domain\User\SignUp\Events\UserCreatedEvent;
use Domain\User\UserEntity;
use Domain\User\SignUp\Contracts\SignUpUserRepositoryInterface as UserRepository;
use Domain\User\SignUp\SignUpUserInput as Input;
use Domain\User\SignUp\SignUpUserOutput as Output;

readonly class SignUpUser
{
    public function __construct(
        private UserRepository           $userRepository,
        private EventDispatcherInterface $eventDispatcher
    ) {}

    public function execute(Input $input, Output $output): void
    {
        $newUser = new UserEntity(
            $input->mailAddress
        );

        $user = $this->userRepository->create($newUser);

        echo "dispatch event";
        $this->eventDispatcher->dispatch(
            new UserCreatedEvent($user)
        );

        $output->setMessage("le compte pour le mail {$input->mailAddress} a été créé, rendez vous sur votre boite mail pour activer votre compte");
    }
}