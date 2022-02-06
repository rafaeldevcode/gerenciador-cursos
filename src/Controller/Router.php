<?php

    namespace Alura\Cursos\Controller;

    abstract class Router
    {
        public function route(string $rota, array $dados):string
        {
            extract($dados);
            ob_flush();
            require __DIR__ . '/../../View/' . $rota;
            $html = ob_get_clean();

            return $html; 
        }

        public function redirect(string $rota):void
        {
            header("location: {$rota}", true, 302);
        }
    }