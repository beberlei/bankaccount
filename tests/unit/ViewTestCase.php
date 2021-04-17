<?php
abstract class ViewTestCase extends PHPUnit_Framework_TestCase
{
    protected $response;

    protected function setUp()
    {
        $this->response = $this->getMockBuilder('bankaccount\\framework\\http\\Response')
                               ->disableOriginalConstructor()
                               ->getMock();
    }
}
