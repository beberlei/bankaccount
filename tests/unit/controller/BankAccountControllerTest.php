<?php
class BankAccountControllerTest extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $mapper;

    /**
     * @covers BankAccountController::__construct
     */
    protected function setUp()
    {
        $this->mapper = $this->getMockBuilder('BankAccountMapper')
                             ->disableOriginalConstructor()
                             ->getMock();

        $this->controller = new BankAccountController($this->mapper);
    }

    /**
     * @covers BankAccountController::execute
     */
    public function testReturnsBankAccountViewWhenBankAccountIsSpecified()
    {
        $request  = new Request;
        $response = new Response;

        $request->set('id', 1);

        $this->mapper->expects($this->any())
                     ->method('findById')
                     ->will($this->returnValue(new BankAccount));

        $view = $this->controller->execute($request, $response);

        $this->assertEquals('BankAccountView', $view);
        $this->assertEquals(0, $response->get('balance'));
    }

    /**
     * @covers            BankAccountController::execute
     * @covers            ControllerException
     * @expectedException ControllerException
     */
    public function testExceptionIsRaisedWhenBankAccountIsNotSpecified()
    {
        $request  = new Request;
        $response = new Response;

        $this->controller->execute($request, $response);
    }
}
