<?php

    namespace Alura\Cursos\Controller;
    
    use Alura\Cursos\Services\Router;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class LoginPainel extends Router implements RequestHandlerInterface
    {
        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $html = Router::route('login/login.php', [
                'titulo' => 'Login'
            ]);

            return new Response(200, [], $html);
        }
    }