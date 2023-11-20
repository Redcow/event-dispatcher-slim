<?php

namespace Infrastructure\User\Controller;

use Domain\Notification\User\Contracts\ActivateAccountUrlGeneratorInterface;
use Domain\User\SignUp\Contracts\SignUpUserRepositoryInterface;
use Domain\User\SignUp\SignUpUserInput as Input;
use Domain\User\SignUp\SignUpUserOutput as Output;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Domain\User\SignUp\SignUpUser;

readonly class UserSignUpController
{
    public function __construct (
        private SignUpUser $useCase,
        private SignUpUserRepositoryInterface $repository
    ) {}

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        //$a = $this->repository;
        $input = new Input(
            "toto@test.fr",
            "123456"
        );

        $output = new Output();
        $message = '';

        $this->useCase->execute($input, $output);

        $response->getBody()->write($output->getMessage());

        return $response;
    }
}