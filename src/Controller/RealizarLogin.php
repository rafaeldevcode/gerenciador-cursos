<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Usuario;
    use Alura\Cursos\Services\Router;
    use Doctrine\ORM\EntityManagerInterface;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class RealizarLogin extends Router implements RequestHandlerInterface
    {

        private $repositorioUsuario;

        public function __construct(EntityManagerInterface $entityManager)
        {
            $this->repositorioUsuario = $entityManager->getRepository(Usuario::class);
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {

            $queryStrings = $request->getParsedBody();
            $email = filter_var($queryStrings['email'], FILTER_VALIDATE_EMAIL);

            if((is_null($email)) || ($email === false)){
                Router::session('danger', 'Email inválido!');

                return new Response(302, ['location' => '/login']);
            }

            $senha = filter_var($queryStrings['senha'], FILTER_SANITIZE_STRING);

            /** @var Usuario $usuario**/
            $usuario = $this->repositorioUsuario->findOneBy(['email' => $email]);

            if((is_null($usuario)) || (!$usuario->senhaEstaCorreta($senha))){
                Router::session('danger', 'Email e/ou senha inválidos!');

                return new Response(302, ['location' => '/login']);
            }

            session_start();
            $_SESSION['usuario_logado'] = true;

            return new Response(302, ['location' => '/listar-cursos']);
        }
    }