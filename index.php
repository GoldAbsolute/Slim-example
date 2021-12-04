<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//require_once './vendor/autoload.php';

require __DIR__ . '/vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader("./templates");
$twig = new Twig\Environment($loader);

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) use ($twig) {
    $body = $twig->render('index.twig');
    $response->getBody()->write($body);
    return $response;
});

$app->get('/home', function (Request $request, Response $response, $args) use($twig) {
    $body = $twig->render('home.twig');
    $response->getBody()->write($body);
    return $response;
});

$app->get('/about', function (Request $request, Response $response, $args) use($twig) {
    $body = $twig->render('about.twig');
    $response->getBody()->write($body);
    return $response;
});

$app->get('/gay', function (Request $request, Response $response, $args) use($twig) {
    $body = $twig->render('gay.twig', [
        'name' => 'You', 'gender' => 'GAY'
    ]);
    $response->getBody()->write($body);
    return $response;
});

$app->get('/sex', function (Request $request, Response $response, $args) use($twig) {
    $body = $twig->render('sex.twig');
    $response->getBody()->write($body);
    return $response;
});

$app->get('/web-site', function (Request $request, Response $response, $args) use($twig) {
    $body = $twig->render('web-site.twig');
    $response->getBody()->write($body);
    return $response;
});

$app->run();

?>