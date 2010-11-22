<?php
class FrontControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers FrontController::__construct
     * @covers FrontController::dispatch
     */
    public function testDefaultViewIsSelectedForDocumentRoot()
    {
        $request  = new Request(array('REQUEST_URI' => '/'));
        $response = new Response;
        $front    = new FrontController($request, $response);
        $router   = new Router;

        $router->addRoute('/', 'DefaultController');

        $this->assertType('DefaultView', $front->dispatch($router));
    }
}
