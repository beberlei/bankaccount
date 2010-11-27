<?php
require_once 'fixture/TestController.php';
require_once 'fixture/TestView.php';

class FrontControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers FrontController::__construct
     * @covers FrontController::dispatch
     * @covers ControllerFactory::getController
     * @covers ViewFactory::getView
     */
    public function testDispatchingWorksCorrectly()
    {
        $request  = new Request(array('REQUEST_URI' => '/test/'));
        $response = new Response;
        $front    = new FrontController($request, $response);
        $router   = new Router(new ControllerFactory);

        $router->set('test', 'TestController');

        $this->assertType('TestView', $front->dispatch($router));
    }
}
