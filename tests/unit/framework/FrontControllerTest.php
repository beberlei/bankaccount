<?php
require_once 'fixture/TestController.php';
require_once 'fixture/TestView.php';

/**
 * @medium
 */
class FrontControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers FrontController::__construct
     * @covers FrontController::dispatch
     */
    public function testDispatchingWorksCorrectly()
    {
        $request  = new Request(array('REQUEST_URI' => '/test'));
        $response = new Response;

        $frontController = new FrontController(
          $request,
          $response,
          new ControllerFactory(
            new MapperFactory(new PDO('sqlite::memory:'))
          ),
          new ViewFactory
        );

        $router = new Router;
        $router->set('test', 'TestController');

        $this->assertInstanceOf(
          'TestView', $frontController->dispatch($router)
        );
    }
}
