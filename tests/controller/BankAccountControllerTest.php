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
    public function testIsExecutedCorrectly()
    {
        $request  = new Request(array(), array('id' => 1));
        $response = new Response;

        $this->mapper->expects($this->any())
                     ->method('findById')
                     ->will($this->returnValue(new BankAccount));

        $view = $this->controller->execute($request, $response);

        $this->assertEquals('BankAccountView', $view);
        $this->assertEquals(0, $response->getData('balance'));
    }
}
