<?php
    require __DIR__ . '/../vendor/autoload.php';

    use Alura\Cursos\Controller\InterfaceController;

    $caminho = $_SERVER['PATH_INFO'];
    $rotas = require __DIR__ . '/../routes/web.php';

    if(!array_key_exists($caminho, $rotas)): http_response_code(404); exit(); endif;

    session_start();
    if((!isset($_SESSION['usuario_logado'])) && (strpos($caminho, 'login') === false) && (strpos($caminho, 'logout') === false)){
        header('location: /login', true, 302);
        return;
    }

    $classe_controladora = $rotas[$caminho];
    /** @var InterfaceController $controlador **/
    $controlador = new $classe_controladora;
    $controlador->processaRequisicao();