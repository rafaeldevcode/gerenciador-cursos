<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class RemoverCurso extends Router implements InterfaceController
    {

        private $entityManager;

        public function __construct()
        {
            $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        }

        public function processaRequisicao(): void
        {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            if((is_null($id)) || ($id === false)){
                $this->redirect('/listar-cursos');
                return;
            }

            $curso = $this->entityManager->getReference(Curso::class, $id);
            $this->entityManager->remove($curso);
            $this->entityManager->flush();
            
            $this->redirect('/listar-cursos');
        }
    }