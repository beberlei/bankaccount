<?php
/**
 * @small
 */
class BankAccountListControllerTest extends ControllerTestCase
{
    /**
     * @covers BankAccountController::__construct
     */
    protected function setUp()
    {
        parent::setUp();
        $this->controller = new BankAccountListController($this->mapper);
    }

    /**
     * @covers BankAccountListController::execute
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

        $this->assertEquals('BankAccountListView', $view);
    }
}
