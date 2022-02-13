<?php
    require __DIR__ . '/../vendor/autoload.php';

    use Alura\Cursos\Controller\InterfaceController;
    use Nyholm\Psr7\Factory\Psr17Factory;
    use Nyholm\Psr7Server\ServerRequestCreator;
    use Psr\Container\ContainerInterface;

    $caminho = $_SERVER['PATH_INFO'];
    $rotas = require __DIR__ . '/../routes/web.php';

    if(!array_key_exists($caminho, $rotas)): http_response_code(404); exit(); endif;

    session_start();
    if((!isset($_SESSION['usuario_logado'])) && (strpos($caminho, 'login') === false) && (strpos($caminho, 'logout') === false)){
        header('location: /login', true, 302);
        return;
    }

    $psr17Factory = new Psr17Factory();
    $creator = new ServerRequestCreator(
        $psr17Factory, // ServerRequestCreator
        $psr17Factory, // UriFactory
        $psr17Factory, // UploadFileFactory
        $psr17Factory, // StreamFactory
    );
    $request = $creator->fromGlobals();

    $classe_controladora = $rotas[$caminho];
    /** @var ContainerInterface $container **/
    $container = require __DIR__ . '/../config/dependences.php';
    /** @var InterfaceController $controlador **/
    $controlador = $container->get($classe_controladora);
    $response = $controlador->handle($request);

    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }

    echo $response->getBody();