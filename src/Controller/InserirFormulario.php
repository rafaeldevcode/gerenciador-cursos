<?php

    namespace Alura\Cursos\Controller;

    class InserirFormulario  extends Router implements InterfaceController
    {

        public function processaRequisicao():void
        { 

            echo $this->route('novo-curso.php', [
                'titulo' => 'Novo curso'
            ]);
        }

    }