<?php
class ControllerTest extends PHPUnit_Framework_TestCase
{
    protected $controller;

    protected function setUp()
    {
        $this->controller = $this->getMockBuilder('Controller')
                                 ->getMockForAbstractClass();
    }

    public function testSomething()
    {
        $this->markTestIncomplete();
    }
}
