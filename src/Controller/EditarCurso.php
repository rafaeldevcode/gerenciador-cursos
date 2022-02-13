<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Services\Router;
    use Doctrine\ORM\EntityManagerInterface;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class EditarCurso extends Router implements RequestHandlerInterface
    {

        private $repositorioCurso;

        public function __construct(EntityManagerInterface $entityManager)
        {
            $this->repositorioCurso = $entityManager->getRepository(Curso::class);
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

            if((is_null($id)) || ($id === false)){
                return new Response(302, ['location' => '/listar-cursos']);
            }
            $curso = $this->repositorioCurso->find($id);

            $html = Router::route('cursos/novo-curso.php', [
                'curso'  => $curso,
                'titulo' => "Editar curso {$curso->getDescricao()}"
            ]);

            return new Response(200, [], $html);
        }
    }