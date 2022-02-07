<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Infra\EntityManagerCreator;
    use Alura\Cursos\Services\Router;

    class Persistencia extends Router implements InterfaceController
    {

        private $entityManager;

        public function __construct()
        {
            $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        }

        public function processaRequisicao(): void
        {
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
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

            Router::redirect('/listar-cursos');

        }

    }