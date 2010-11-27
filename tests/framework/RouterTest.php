<?php
class RouterTest extends PHPUnit_Framework_TestCase
{
    protected $router;

    protected function setUp()
    {
        $this->router = new Router(new ControllerFactory);
        $this->router->set('/bankaccount/', 'BankAccountController');
    }

    /**
     * @covers Router::route
     */
    public function testBankAccountControllerIsSelectedForDocumentRoot()
    {
        $mapper = $this->getMockBuilder('BankAccountMapper')
                       ->disableOriginalConstructor()
                       ->getMock();

        Registry::getInstance()->register('BankAccountMapper', $mapper);

        $request = new Request(array('REQUEST_URI' => '/bankaccount/'));

        $this->assertType(
          'BankAccountController', $this->router->route($request)
        );
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
