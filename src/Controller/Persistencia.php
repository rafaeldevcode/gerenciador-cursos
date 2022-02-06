<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Infra\EntityManagerCreator;

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
            }else{
                $this->entityManager->persist($curso);
            }
            $this->entityManager->flush();

            $this->redirect('/listar-cursos');

        }

    }