<?php
/**
 * @medium
 */
class RouterTest extends PHPUnit_Framework_TestCase
{
    protected $router;

    protected function setUp()
    {
        $mapper = $this->getMockBuilder('BankAccountMapper')
                       ->disableOriginalConstructor()
                       ->getMock();

        $mapperFactory = $this->getMockBuilder('MapperFactory')
                              ->disableOriginalConstructor()
                              ->getMock();

        $mapperFactory->expects($this->any())
                      ->method('getMapper')
                      ->will($this->returnValue($mapper));

        $this->router = new Router(new ControllerFactory($mapperFactory));
        $this->router->set('bankaccount', 'BankAccountController');
    }

    /**
     * @covers Router::route
     */
    public function testCorrectControllerIsSelected()
    {
        $request = new Request(
          array('REQUEST_URI' => '/bankaccount/id/1')
        );

        $this->assertEquals(
          'BankAccountController', $this->router->route($request)
        );

        $this->assertEquals(1, $request->get('id'));
    }

    /**
     * @covers            Router::route
     * @expectedException RouterException
     */
    public function testExceptionWhenNoControllerCanBeSelected()
    {
        $request = new Request(array('REQUEST_URI' => '/is/not/configured'));
        $this->router->route($request);
    }

    /**
     * @covers            Router::route
     * @expectedException RouterException
     */
    public function testExceptionWhenSomethingIsWrongWithTheValues()
    {
        $request = new Request(array('REQUEST_URI' => '/bankaccount/id'));
        $this->router->route($request);
    }
}
