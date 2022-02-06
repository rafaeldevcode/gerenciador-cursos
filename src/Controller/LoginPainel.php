<?php

    namespace Alura\Cursos\Controller;

    class LoginPainel extends Router implements InterfaceController
    {
        public function processaRequisicao(): void
        {
            echo $this->route('login/login.php', [
                'titulo' => 'Login'
            ]);
        }
    }