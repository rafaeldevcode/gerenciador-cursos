<?php

    namespace Alura\Cursos\Services;

    class Router
    {
        public function route(string $rota, array $dados):string
        {
            extract($dados);
            ob_flush();
            require __DIR__ . '/../../View/' . $rota;
            $html = ob_get_clean();

            return $html; 
        }

        public function session(string $type_message, string $message):void
        {
            $_SESSION['type_message'] = $type_message;
            $_SESSION['message'] = $message;
        }
    }