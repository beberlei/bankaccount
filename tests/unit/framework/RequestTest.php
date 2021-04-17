<?php
use bankaccount\framework\http\Request;

/**
 * @small
 */
class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\http\Request::__call
     * @covers bankaccount\framework\http\Request::__construct
     */
    public function testRequestUriCanBeRetrieved()
    {
        $request = new Request(array('REQUEST_URI' => '/'));
        $this->assertEquals('/', $request->getServer('REQUEST_URI'));
    }

    /**
     * @covers            bankaccount\framework\http\Request::__call
     * @expectedException InvalidArgumentException
     */
    public function testExceptionIsRaisedWhenRequestUriIsNotSet()
    {
        $request = new Request;
        $request->getServer('REQUEST_URI');
    }

    /**
     * @covers            bankaccount\framework\http\Request::__call
     * @expectedException BadMethodCallException
     */
    public function testExceptionIsRaisedWhenIllegalVariableTypeIsRequested()
    {
        $request = new Request;
        $request->getFoo('bar');
    }
}
