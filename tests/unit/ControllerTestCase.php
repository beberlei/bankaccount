<?php
abstract class ControllerTestCase extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $mapper;
    protected $request;
    protected $response;

    protected function setUp()
    {
        $this->mapper = $this->getMockBuilder('BankAccountMapper')
                             ->disableOriginalConstructor()
                             ->getMock();

        $this->request = $this->getMockBuilder('Request')
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->response = $this->getMockBuilder('Response')
                               ->disableOriginalConstructor()
                               ->getMock();
    }
}
