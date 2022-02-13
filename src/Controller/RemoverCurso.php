<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Services\Router;
    use Doctrine\ORM\EntityManagerInterface;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class RemoverCurso extends Router implements RequestHandlerInterface
    {

        private $entityManager;

        public function __construct(EntityManagerInterface $entityManager)
        {
            $this->entityManager = $entityManager;
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

            if((is_null($id)) || ($id === false)){

                return new Response(302, ['location' => '/listar-cursos']);
            }

            $curso = $this->entityManager->getReference(Curso::class, $id);
            $this->entityManager->remove($curso);
            $this->entityManager->flush();

            Router::session('success', 'Curso removido com sucesso!');
            
            return new Response(302, ['location' => '/listar-cursos']);
        }
    }