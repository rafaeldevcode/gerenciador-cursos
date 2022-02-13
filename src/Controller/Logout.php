<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Services\Router;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class Logout extends Router implements RequestHandlerInterface
    {
        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            session_destroy();

            return new Response(302, ['location' => '/login']);
        }   
    }