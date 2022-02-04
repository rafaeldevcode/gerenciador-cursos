<?php
    require __DIR__ . '/../vendor/autoload.php';

    use Alura\Cursos\Controller\InterfaceController;

    $caminho = $_SERVER['REQUEST_URI'];
    $rotas = require __DIR__ . '/../routes/web.php';

    if(!array_key_exists($caminho, $rotas)): http_response_code(404); exit(); endif;

    $classe_controladora = $rotas[$caminho];
    /** @var InterfaceController $controlador **/
    $controlador = new $classe_controladora;
    $controlador->processaRequisicao();