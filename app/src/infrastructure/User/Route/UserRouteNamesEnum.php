<?php

namespace Infrastructure\User\Route;

enum UserRouteNamesEnum: string
{
    case SignUp = 'user.signup';
    case ActivateAccount = 'user.activate';
}
