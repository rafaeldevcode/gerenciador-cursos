<?php

    namespace Alura\Cursos\Controller;
    use Alura\Cursos\Services\Router;

    class LoginPainel extends Router implements InterfaceController
    {
        public function processaRequisicao(): void
        {
            echo Router::route('login/login.php', [
                'titulo' => 'Login'
            ]);
        }
    }