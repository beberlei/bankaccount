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

        $view = $controller->execute(
          $this->request, $this->response
        );

        return $view;
    }
}
