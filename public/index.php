<?php
    require __DIR__ . '/../vendor/autoload.php';

    use Alura\Cursos\Controller\{ListarCursos, InserirFormulario};

    switch($_SERVER['REQUEST_URI']){
        case '/listar-cursos':
            
            $controlador = new ListarCursos();
            $controlador->processaRequisicao();
            break;
        case '/novo-curso':

            $controlador = new InserirFormulario();
            $controlador->processaRequisicao();
            break;
        default:
            echo 'Erro 404';
            break;
    }