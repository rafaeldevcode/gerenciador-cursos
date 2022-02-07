<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Controller\InterfaceController;
    use Alura\Cursos\Services\Router;

    class Logout extends Router implements InterfaceController
    {
        public function processaRequisicao(): void
        {
            session_destroy();

            Router::redirect('/login');
        }   
    }