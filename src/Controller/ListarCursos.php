<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Services\Router;
    use Doctrine\ORM\EntityManagerInterface;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class ListarCursos extends Router implements RequestHandlerInterface
    {

        private $repositorioDeCursos;

        public function __construct(EntityManagerInterface $entityManager)
        {
            $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {

            $html = Router::route('cursos/listar-curso.php', [
                'cursos' => $this->repositorioDeCursos->findAll(),
                'titulo' => 'Listar cursos'
            ]);

            return new Response(200, [], $html);
        }
    }