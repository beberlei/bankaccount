<?php
class BankAccountListControllerTest extends PHPUnit_Framework_TestCase
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

        $this->controller = new BankAccountListController($this->mapper);
    }

    /**
     * @covers BankAccountListController::execute
     */
    public function testReturnsListOfBankAccounts()
    {
        $request  = new Request;
        $response = new Response;

        $this->mapper->expects($this->any())
                     ->method('getAllIds')
                     ->will($this->returnValue(array(1)));

        $view = $this->controller->execute($request, $response);

        $this->assertEquals('BankAccountListView', $view);
        $this->assertEquals(array(1), $response->get('ids'));
    }
}
