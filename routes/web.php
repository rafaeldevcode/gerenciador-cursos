<?php

    use Alura\Cursos\Controller\{InserirFormulario, ListarCursos, Persistencia, RemoverCurso, EditarCurso, LoginPainel, RealizarLogin, Logout};

    return [
        '/listar-cursos' => ListarCursos::class,
        '/novo-curso'    => InserirFormulario::class,
        '/salvar-curso'  => Persistencia::class,
        '/remover-curso' => RemoverCurso::class,
        '/editar-curso'  => EditarCurso::class,
        '/login'         => LoginPainel::class,
        '/realizar-login' => RealizarLogin::class,
        '/logout'         => Logout::class,
    ];