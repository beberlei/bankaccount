<?php
require __DIR__ . '/../src/autoload.php';

// Set REQUEST_URI to / when run from CLI.
if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}

$request  = new Request($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES, $_ENV);
$response = new Response;
$front    = new FrontController($request, $response);
$router   = new Router;

$router->addRoute('/', 'DefaultController');

$view = $front->dispatch($router);
$view->render();
