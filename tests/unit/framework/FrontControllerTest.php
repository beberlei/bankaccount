<?php
use bankaccount\framework\FrontController;
use bankaccount\framework\Request;
use bankaccount\framework\Response;
use bankaccount\framework\controller\Factory as ControllerFactory;
use bankaccount\framework\mapper\Factory as MapperFactory;
use bankaccount\framework\view\Factory as ViewFactory;
use bankaccount\framework\router\Router;

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
