<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use MyApp\Data\Connection;
use MyApp\Api\Structures;


require __DIR__ . '/../vendor/autoload.php';
include "../env_autoloader.php";
//require __DIR__ . '/../classes/Structures.class.php';

$app = AppFactory::create();

/*
Tutorial para usar SLIM en un subdirectorio
https://akrabat.com/running-slim-4-in-a-subdirectory/
*/

//Esta función soluciona el problema de la ruta diferente junto con el HTACCESS de public
$app->setBasePath((function () {
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    $uri = (string) parse_url('http://a' . $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    if (stripos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
        return $_SERVER['SCRIPT_NAME'];
    }
    if ($scriptDir !== '/' && stripos($uri, $scriptDir) === 0) {
        return $scriptDir;
    }
    return '';
})());

/*
solución al not found error de la librería
https://stackoverflow.com/questions/60341595/error-in-index-php-file-to-create-rest-api-using-slim-framework


*/

$app->get('/structures', function (Request $request, Response $response, $args) {
    $json = Structures::getAll();
    $response->getBody()->write($json);  
    return $response;
});

$app->get('/structures/{id}', function (Request $request, Response $response, $args) {
    $json = Structures::getById($args['id']);
    $response->getBody()->write($json);  
    return $response;
});


$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello");
    return $response;
});




$app->run();