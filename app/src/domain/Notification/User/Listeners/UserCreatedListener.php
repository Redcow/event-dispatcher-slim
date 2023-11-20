<?php

namespace Domain\Notification\User\Listeners;

use Domain\Notification\UrlGeneratorInterface;
use Domain\User\SignUp\Events\UserCreatedEvent;

readonly class UserCreatedListener
{

    public function __construct(
        private UrlGeneratorInterface $urlGenerator
    ) {}

    public function __invoke(UserCreatedEvent $event): void
    {
        $user = $event->getObject();

        $url = $this->urlGenerator->getGoToActiveAccountUrl($user->token);

        echo 'event UserCreated trigger';

        echo '           ';

        echo $url;

        // todo mailer->send à user->mail
    }

}