<?php

use Alura\Cursos\Controller\{InserirFormulario, ListarCursos, SalvarCurso};

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso'    => InserirFormulario::class,
    '/salvar-curso'  => SalvarCurso::class
];