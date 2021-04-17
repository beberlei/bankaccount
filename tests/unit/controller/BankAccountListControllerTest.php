<?php
use bankaccount\controller\BankAccountList as BankAccountListController;

/**
 * @small
 */
class BankAccountListControllerTest extends ControllerTestCase
{
    /**
     * @covers bankaccount\controller\BankAccount::__construct
     */
    protected function setUp()
    {
        parent::setUp();
        $this->controller = new BankAccountListController($this->mapper);
    }

    /**
     * @covers bankaccount\controller\BankAccountList::execute
     */
    public function testReturnsListOfBankAccounts()
    {
        $this->mapper->expects($this->any())
                     ->method('getAllIds')
                     ->will($this->returnValue(array(1)));

        $this->response->expects($this->once())
                       ->method('set')
                       ->with($this->equalTo('ids'),
                              $this->equalTo(array(1)));

        $view = $this->controller->execute($this->request, $this->response);

        $this->assertEquals('bankaccount\view\BankAccountList', $view);
    }
}
