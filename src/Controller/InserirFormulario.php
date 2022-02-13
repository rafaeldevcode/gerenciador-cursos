<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Services\Router;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class InserirFormulario  extends Router implements RequestHandlerInterface
    {

        public function handle(ServerRequestInterface $request): ResponseInterface 
        { 

            $html = Router::route('cursos/novo-curso.php', [
                'titulo' => 'Novo curso'
            ]);

            return new Response(200, [], $html);
        }

    }