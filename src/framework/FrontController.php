<?php
namespace bankaccount\framework;

use bankaccount\framework\controller\Factory as ControllerFactory;
use bankaccount\framework\view\Factory as ViewFactory;
use bankaccount\framework\router\Router;
use bankaccount\framework\Request;
use bankaccount\framework\Response;

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
