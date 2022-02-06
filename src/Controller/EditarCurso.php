<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class EditarCurso extends Router implements InterfaceController
    {

        private $repositorioCurso;

        public function __construct()
        {
            $entityManager = (new EntityManagerCreator)->getEntityManager();
            $this->repositorioCurso = $entityManager->getRepository(Curso::class);
        }

        public function processaRequisicao(): void
        {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            if((is_null($id)) || ($id === false)){
                $this->redirect('/listar-cursos');
                return;
            }
            $curso = $this->repositorioCurso->find($id);

            echo $this->route('cursos/novo-curso.php', [
                'curso'  => $curso,
                'titulo' => "Editar curso {$curso->getDescricao()}"
            ]);
        }
    }