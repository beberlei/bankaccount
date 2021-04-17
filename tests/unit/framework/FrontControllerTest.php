<?php
use bankaccount\framework\factory\ControllerFactory;
use bankaccount\framework\factory\MapperFactory;
use bankaccount\framework\factory\ViewFactory;
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;
use bankaccount\framework\router\Router;
use bankaccount\framework\FrontController;

/**
 * @medium
 */
class FrontControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\FrontController::__construct
     * @covers bankaccount\framework\FrontController::dispatch
     */
    public function testDispatchingWorksCorrectly()
    {
        $request  = new Request(array('REQUEST_URI' => '/test'));
        $response = new Response;
        $router   = new Router;
        $router->set('test', 'TestController');

        $frontController = new FrontController(
          $request,
          $response,
          $router,
          new ControllerFactory(
            new MapperFactory(new PDO('sqlite::memory:'))
          ),
          new ViewFactory
        );

        $this->assertInstanceOf(
          'TestView', $frontController->dispatch($router)
        );
    }
}
