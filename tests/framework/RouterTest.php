<?php
class RouterTest extends PHPUnit_Framework_TestCase
{
    protected $router;

    /**
     * @covers Router::addRoute
     */
    protected function setUp()
    {
        $this->router = new Router(new ControllerFactory);
        $this->router->addRoute('/', 'DefaultController');
    }

    /**
     * @covers Router::route
     */
    public function testDefaultControllerIsSelectedForDocumentRoot()
    {
        $mapper = $this->getMockBuilder('BankAccountMapper')
                       ->disableOriginalConstructor()
                       ->getMock();

        Registry::getInstance()->register('BankAccountMapper', $mapper);

        $request = new Request(array('REQUEST_URI' => '/'));
        $this->assertType('DefaultController', $this->router->route($request));
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
}
