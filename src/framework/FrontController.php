<?php
class FrontController
{
    protected $request;
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request  = $request;
        $this->response = $response;
    }

    public function dispatch(Router $router)
    {
        $controller = $router->route($this->request);

        $viewName = $controller->execute(
          $this->request, $this->response
        );

        $factory = new ViewFactory;
        $view    = $factory->getView(
          $viewName, $this->request, $this->response
        );

        return $view;
    }
}
