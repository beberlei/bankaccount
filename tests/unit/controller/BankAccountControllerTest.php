<?php
use bankaccount\controller\BankAccount as BankAccountController;

/**
 * @small
 */
class BankAccountControllerTest extends ControllerTestCase
{
    /**
     * @covers bankaccount\controller\BankAccount::__construct
     */
    protected function setUp()
    {
        parent::setUp();
        $this->controller = new BankAccountController($this->mapper);
    }

    /**
     * @covers bankaccount\controller\BankAccount::execute
     */
    public function testReturnsBankAccountViewWhenBankAccountIsSpecified()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with($this->equalTo('id'))
                      ->will($this->returnValue(1));

        $this->mapper->expects($this->any())
                     ->method('findById')
                     ->will($this->returnValue(
                       new bankaccount\model\BankAccount
                     ));

        $this->response->expects($this->at(0))
                       ->method('set')
                       ->with($this->equalTo('id'),
                              $this->equalTo(1));

        $this->response->expects($this->at(1))
                       ->method('set')
                       ->with($this->equalTo('balance'),
                              $this->equalTo(0));

        $view = $this->controller->execute($this->request, $this->response);

        $this->assertEquals('bankaccount\\view\\BankAccount', $view);
    }

    /**
     * @covers            bankaccount\controller\BankAccount::execute
     * @covers            bankaccount\framework\controller\Exception
     * @expectedException bankaccount\framework\controller\Exception
     */
    public function testExceptionIsRaisedWhenBankAccountIsNotSpecified()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with($this->equalTo('id'))
                      ->will($this->throwException(new \OutOfBoundsException));

        $this->controller->execute($this->request, $this->response);
    }

    /**
     * @covers            bankaccount\controller\BankAccount::execute
     * @covers            bankaccount\framework\controller\Exception
     * @expectedException bankaccount\framework\controller\Exception
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
