<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Curso;
    use Alura\Cursos\Infra\EntityManagerCreator;

    class ListarCursos extends Router implements InterfaceController
    {

        private $repositorioDeCursos;

        public function __construct()
        {
            $entityManager = (new EntityManagerCreator())->getEntityManager();
            $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
        }

        public function processaRequisicao():void
        {

            echo $this->route('cursos/listar-curso.php', [
                'cursos' => $this->repositorioDeCursos->findAll(),
                'titulo' => 'Listar cursos'
            ]);
        }
    }