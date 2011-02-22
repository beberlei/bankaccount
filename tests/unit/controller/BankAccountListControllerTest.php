<?php
/**
 * @small
 */
class BankAccountListControllerTest extends PHPUnit_Framework_TestCase
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

        $this->controller = new BankAccountListController($this->mapper);

        $this->request = $this->getMockBuilder('Request')
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->response = $this->getMockBuilder('Response')
                               ->disableOriginalConstructor()
                               ->getMock();
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
