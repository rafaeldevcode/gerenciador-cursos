<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Services\Router;

    class InserirFormulario  extends Router implements InterfaceController
    {

        public function processaRequisicao():void
        { 

            echo Router::route('cursos/novo-curso.php', [
                'titulo' => 'Novo curso'
            ]);
        }

    }