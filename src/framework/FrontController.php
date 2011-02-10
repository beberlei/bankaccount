<?php
class FrontController
{
    protected $request;
    protected $response;
    protected $controllerFactory;
    protected $viewFactory;

    public function __construct(Request $request, Response $response, ControllerFactory $controllerFactory, ViewFactory $viewFactory)
    {
        $this->request           = $request;
        $this->response          = $response;
        $this->controllerFactory = $controllerFactory;
        $this->viewFactory       = $viewFactory;
    }

    public function dispatch(Router $router)
    {
        $controller = $this->controllerFactory->getController(
          $router->route($this->request)
        );

        $viewName = $controller->execute(
          $this->request, $this->response
        );

        $view = $this->viewFactory->getView(
          $viewName, $this->request, $this->response
        );

        return $view;
    }
}
