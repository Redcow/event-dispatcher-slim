<?php

namespace Infrastructure\User\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserActivationController
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $response->getBody()->write("token is : ". $args['token']);
        return $response;
    }
}