<?php
abstract class ControllerTestCase extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $mapper;
    protected $request;
    protected $response;

    protected function setUp()
    {
        $this->mapper = $this->getMockBuilder('bankaccount\\mapper\\BankAccount')
                             ->disableOriginalConstructor()
                             ->getMock();

        $this->request = $this->getMockBuilder('bankaccount\\framework\\http\\Request')
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->response = $this->getMockBuilder('bankaccount\\framework\\http\\Response')
                               ->disableOriginalConstructor()
                               ->getMock();
    }
}
