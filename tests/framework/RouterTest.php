<?php
class RouterTest extends PHPUnit_Framework_TestCase
{
    protected $router;

    protected function setUp()
    {
        $this->router = new Router(new ControllerFactory);
        $this->router->set('bankaccount', 'BankAccountController');

        $mapper = $this->getMockBuilder('BankAccountMapper')
                       ->disableOriginalConstructor()
                       ->getMock();

        Registry::getInstance()->register('BankAccountMapper', $mapper);
    }

    /**
     * @covers Router::route
     */
    public function testCorrectControllerIsSelectedWithAction()
    {
        $request = new Request(
          array('REQUEST_URI' => '/bankaccount/show/id/1')
        );

        $this->assertInstanceOf(
          'BankAccountController', $this->router->route($request)
        );

        $this->assertEquals('show', $request->get('action'));
        $this->assertEquals(1, $request->get('id'));
    }

    /**
     * @covers Router::route
     */
    public function testCorrectControllerIsSelectedWithDefaultAction()
    {
        $request = new Request(
          array('REQUEST_URI' => '/bankaccount')
        );

        $this->assertInstanceOf(
          'BankAccountController', $this->router->route($request)
        );

        $this->assertEquals('default', $request->get('action'));
    }

    /**
     * @covers            Router::route
     * @expectedException RuntimeException
     */
    public function testExceptionWhenNoControllerCanBeSelected()
    {
        $request = new Request(array('REQUEST_URI' => '/is/not/configured'));
        $this->router->route($request);
    }

    /**
     * @covers            Router::route
     * @expectedException RuntimeException
     */
    public function testExceptionWhenSomethingIsWrongWithTheValues()
    {
        $request = new Request(array('REQUEST_URI' => '/bankaccount/show/id'));
        $this->router->route($request);
    }
}
