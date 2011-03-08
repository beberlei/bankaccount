<?php
require __DIR__ . '/../src/autoload.php';

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
$router->set('bankaccount',  'BankAccountController');
$router->set('bankaccounts', 'BankAccountListController');

$controllerFactory = new ControllerFactory($mapperFactory);
$viewFactory       = new ViewFactory;
$frontController   = new FrontController(
                       $request,
                       $response,
                       $router,
                       $controllerFactory,
                       $viewFactory
                     );

$view = $frontController->dispatch($router);
print $view->render();
