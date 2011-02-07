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
        $request         = new Request(array('REQUEST_URI' => '/test/'));
        $response        = new Response;
        $frontController = new FrontController($request, $response);
        $router          = new Router(
          new ControllerFactory(new MapperFactory(new PDO('sqlite::memory:')))
        );

        $router->set('test', 'TestController');

        $this->assertInstanceOf(
          'TestView', $frontController->dispatch($router)
        );
    }
}
