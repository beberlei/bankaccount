<?php
/**
 * @small
 */
class BankAccountControllerTest extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $mapper;
    protected $request;
    protected $response;

    /**
     * @covers BankAccountController::__construct
     */
    protected function setUp()
    {
        $this->mapper = $this->getMockBuilder('BankAccountMapper')
                             ->disableOriginalConstructor()
                             ->getMock();

        $this->controller = new BankAccountController($this->mapper);

        $this->request = $this->getMockBuilder('Request')
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->response = $this->getMockBuilder('Response')
                               ->disableOriginalConstructor()
                               ->getMock();
    }

    /**
     * @covers BankAccountController::execute
     */
    public function testReturnsBankAccountViewWhenBankAccountIsSpecified()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with($this->equalTo('id'))
                      ->will($this->returnValue(1));

        $this->mapper->expects($this->any())
                     ->method('findById')
                     ->will($this->returnValue(new BankAccount));

        $this->response->expects($this->once())
                       ->method('set')
                       ->with($this->equalTo('balance'),
                              $this->equalTo(0));

        $view = $this->controller->execute($this->request, $this->response);

        $this->assertEquals('BankAccountView', $view);
    }

    /**
     * @covers            BankAccountController::execute
     * @covers            ControllerException
     * @expectedException ControllerException
     */
    public function testExceptionIsRaisedWhenBankAccountIsNotSpecified()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with($this->equalTo('id'))
                      ->will($this->throwException(new OutOfBoundsException));

        $this->controller->execute($this->request, $this->response);
    }

    /**
     * @covers            BankAccountController::execute
     * @covers            ControllerException
     * @expectedException ControllerException
     */
    public function testExceptionIsRaisedWhenBankAccountIsNotFound()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with($this->equalTo('id'))
                      ->will($this->returnValue(3));

        $this->mapper->expects($this->any())
                     ->method('findById')
                     ->will($this->throwException(new OutOfBoundsException));

        $this->controller->execute($this->request, $this->response);
    }
}
