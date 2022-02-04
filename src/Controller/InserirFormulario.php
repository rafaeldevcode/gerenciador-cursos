<?php

    namespace Alura\Cursos\Controller;

    class InserirFormulario implements InterfaceController
    {

        public function processaRequisicao():void
        { 
            $titulo = 'Novo curso';
            require __DIR__ . '/../../View/novo-curso.php';
        }

    }