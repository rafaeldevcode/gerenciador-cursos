<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Services\Router;
    use Doctrine\ORM\EntityManagerInterface;
    use Nyholm\Psr7\Response;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
    use Psr\Http\Server\RequestHandlerInterface;

    class Persistencia extends Router implements RequestHandlerInterface
    {

        private $entityManager;

        public function __construct(EntityManagerInterface $entityManager)
        {
            $this->entityManager = $entityManager;
        }

        public function handle(ServerRequestInterface $request): ResponseInterface
        {
            $descricao = filter_var($request->getParsedBody()['descricao'], FILTER_SANITIZE_STRING);
            $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);
            $curso = new Curso();
            $curso->setDescricao($descricao);

            if((!is_null($id)) && ($id !== false)){
                $curso->setId($id);
                $this->entityManager->merge($curso);

                Router::session('success', 'Curso editado com sucesso!');
            }else{
                $this->entityManager->persist($curso);

                Router::session('success', 'Curso adicionado com sucesso!');
            }
            $this->entityManager->flush();

            return new Response(302, ['location' => '/listar-cursos']);
        }

    }