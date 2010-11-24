<?php
require __DIR__ . '/../src/autoload.php';

// Set some super-global variables for demo purposes.
if (PHP_SAPI == 'cli') {
    $_GET['id']             = 1;
    $_SERVER['REQUEST_URI'] = '/';
}

$request  = new Request($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES, $_ENV);
$response = new Response;
$front    = new FrontController($request, $response);
$router   = new Router;

$router->addRoute('/', 'DefaultController');

Registry::getInstance()->register(
  'pdo', new PDO('sqlite:' . __DIR__ . '/bankaccount.db')
);

$view = $front->dispatch($router);
print $view->render();
