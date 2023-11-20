<?php

use Infrastructure\User\Controller\UserActivationController;
use Slim\App;
use Slim\Routing\RouteCollectorProxy as Group;

use Infrastructure\User\Controller\UserSignUpController;
use Infrastructure\User\Route\UserRouteNamesEnum;

return function (App $app): void
{
    $app->group('/users', function (Group $group): void
    {
        $group->get(
            '/add',
            UserSignUpController::class
        )->setName('user.add');

        $group->get(
            '/verify/{token}',
            UserActivationController::class
        )->setName(UserRouteNamesEnum::ActivateAccount->value);
    });
    /*$app->group('users', function (Group $group): void
    {
        $group->get('/add', UserSignUpController::class)->setName(UserRouteNamesEnum::SignUp->name);
    });*/
};