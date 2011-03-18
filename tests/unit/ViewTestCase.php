<?php
abstract class ViewTestCase extends PHPUnit_Framework_TestCase
{
    protected $request;
    protected $response;

    protected function setUp()
    {
        $this->request = $this->getMockBuilder('Request')
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->response = $this->getMockBuilder('Response')
                               ->disableOriginalConstructor()
                               ->getMock();
    }
}
