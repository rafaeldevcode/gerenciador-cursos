<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Usuario;
    use Alura\Cursos\Infra\EntityManagerCreator;
    use Alura\Cursos\Services\Router;

    class RealizarLogin extends Router implements InterfaceController
    {

        private $repositorioUsuario;

        public function __construct()
        {
            $entityManager = (new EntityManagerCreator())->getEntityManager();
            $this->repositorioUsuario = $entityManager->getRepository(Usuario::class);
        }

        public function processaRequisicao(): void
        {

            $email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if((is_null($email)) || ($email === false)){
                Router::session('danger', 'Email inválidos!');
                Router::redirect('/login');
            }

            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

            /** @var Usuario $usuario**/
            $usuario = $this->repositorioUsuario->findOneBy(['email' => $email]);

            if((is_null($usuario)) || (!$usuario->senhaEstaCorreta($senha))){
                Router::session('danger', 'Email e/ou senha inválidos!');
                Router::redirect('/login');
            }

            session_start();
            $_SESSION['usuario_logado'] = true;

            Router::redirect('/listar-cursos');
        }
    }