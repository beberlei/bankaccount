<?php
require __DIR__ . '/../src/autoload.php';

use bankaccount\framework\factory\ControllerFactory;
use bankaccount\framework\factory\MapperFactory;
use bankaccount\framework\factory\ViewFactory;
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;
use bankaccount\framework\router\Router;
use bankaccount\framework\FrontController;

// Set some super-global variables for demo purposes.
if (PHP_SAPI == 'cli') {
    $_SERVER['REQUEST_URI'] = '/bankaccount/id/1';
}

$request  = new Request($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES, $_ENV);
$response = new Response;

$mapperFactory = new MapperFactory(
  new PDO('sqlite:' . dirname(__DIR__) . '/database/bankaccount.db')
);

$router = new Router;
$router->set('bankaccount',  'BankAccount');
$router->set('bankaccounts', 'BankAccountList');

$controllerFactory = new ControllerFactory($mapperFactory);
$viewFactory       = new ViewFactory;
$frontController   = new FrontController(
                       $request,
                       $response,
                       $router,
                       $controllerFactory,
                       $viewFactory
                     );

$view = $frontController->dispatch();
print $view->render();
