<?php

use Alura\Cursos\Controller\{InserirFormulario, ListarCursos, Persistencia, RemoverCurso, EditarCurso};

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso'    => InserirFormulario::class,
    '/salvar-curso'  => Persistencia::class,
    '/remover-curso' => RemoverCurso::class,
    '/editar-curso'  => EditarCurso::class
];