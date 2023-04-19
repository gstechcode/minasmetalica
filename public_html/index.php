<?php
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Slim\Factory\AppFactory;

    require __DIR__ . "/../vendor/autoload.php";

    $app= AppFactory::create();

    $app->get("/", function(Request $request, Response $response){
        require __DIR__ . "/../views/apresentacao.phtml";
        return $response;
    });

    $app->get("/home", function(Request $request, Response $response){
        require __DIR__ . "/../views/home.phtml";
        return $response;
    });

    $app->get("/institucional", function(Request $request, Response $response){
        require __DIR__ . "/../views/institucional.phtml";
        return $response;
    });

    $app->get("/servicos", function(Request $request, Response $response){
        require __DIR__ . "/../views/servicos.phtml";
        return $response;
    });

    $app->get("/galeria", function(Request $request, Response $response){
        require __DIR__ . "/../views/galeria.phtml";
        return $response;
    });

    $app->get("/galeria/residencial", function(Request $request, Response $response){
        require __DIR__ . "/../views/components/galeria/residencial.phtml";
        return $response;
    });

    $app->get("/galeria/industrial", function(Request $request, Response $response){
        require __DIR__ . "/../views/components/galeria/industrial.phtml";
        return $response;
    });

    $app->get("/galeria/comercial", function(Request $request, Response $response){
        require __DIR__ . "/../views/components/galeria/comercial.phtml";
        return $response;
    });

    $app->get("/contato", function(Request $request, Response $response){
        require __DIR__ . "/../views/contato.phtml";
        return $response;
    });

    $app->get("/images/clientes[/{params:.*}]", function(Request $request, Response $response, array $argv){
        $arq= file_get_contents(__DIR__ . "/../Images/clientes/" . $argv["params"] . ".png");
        $response->getBody()->write($arq);
        return $response->withHeader('Content-type', 'image/png');
    });

    $app->get("/images/services[/{params:.*}]", function(Request $request, Response $response, array $argv){
        $arq= file_get_contents(__DIR__ . "/../Images/services/" . $argv["params"] . ".png");
        $response->getBody()->write($arq);
        return $response->withHeader('Content-type', 'image/png');
    });

    $app->get("/images/{teste}", function(Request $request, Response $response, array $argv){
        $arq= file_get_contents(__DIR__ . "/../Images/" . $argv["teste"] . ".png");
        $response->getBody()->write($arq);
        return $response->withHeader('Content-type', 'image/png');
    });
    $app->get("/images/residencial/{teste}", function(Request $request, Response $response, array $argv){
        $arq= file_get_contents(__DIR__ . "/../Images/residencial/" . $argv["teste"] . ".png");
        $response->getBody()->write($arq);
        return $response->withHeader('Content-type', 'image/png');
    });

    $app->get("/images/comercial/{teste}", function(Request $request, Response $response, array $argv){
        $arq= file_get_contents(__DIR__ . "/../Images/comercial/" . $argv["teste"] . ".png");
        $response->getBody()->write($arq);
        return $response->withHeader('Content-type', 'image/png');
    });

    $app->get("/images/industrial/{teste}", function(Request $request, Response $response, array $argv){
        $arq= file_get_contents(__DIR__ . "/../Images/industrial/" . $argv["teste"] . ".png");
        $response->getBody()->write($arq);
        return $response->withHeader('Content-type', 'image/png');
    });


    $app->run();
    