<?php

    namespace Alura\Cursos\Controller;

    use Alura\Cursos\Entity\Usuario;
    use Alura\Cursos\Infra\EntityManagerCreator;

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
                echo "E-mail inválido!";
                return;
            }

            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

            /** @var Usuario $usuario**/
            $usuario = $this->repositorioUsuario->findOneBy(['email' => $email]);

            if((is_null($usuario)) || (!$usuario->senhaEstaCorreta($senha))){
                echo "Email e/ou senha inválidos!";
                return;
            }

            $this->redirect('/list');
        }
    }