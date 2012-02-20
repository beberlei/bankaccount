<?php
namespace bankaccount\framework;

use bankaccount\framework\factory\ControllerFactory;
use bankaccount\framework\factory\ViewFactory;
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;
use bankaccount\framework\router\Router;

class FrontController
{
    protected $request;
    protected $response;
    protected $router;
    protected $controllerFactory;
    protected $viewFactory;

    public function __construct(Request $request, Response $response, Router $router, ControllerFactory $controllerFactory, ViewFactory $viewFactory)
    {
        $this->request           = $request;
        $this->response          = $response;
        $this->router            = $router;
        $this->controllerFactory = $controllerFactory;
        $this->viewFactory       = $viewFactory;
    }

    public function dispatch()
    {
        $controller = $this->controllerFactory->getController(
          $this->router->route($this->request)
        );

        $viewName = $controller->execute(
          $this->request, $this->response
        );

        return $this->viewFactory->getView($viewName, $this->response);
    }
}
