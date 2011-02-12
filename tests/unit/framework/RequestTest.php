<?php
/**
 * @small
 */
class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Request::__call
     * @covers Request::__construct
     */
    public function testRequestUri()
    {
        $request = new Request(array('REQUEST_URI' => '/'));
        $this->assertEquals('/', $request->getServer('REQUEST_URI'));
    }

    /**
     * @covers            Request::__call
     * @expectedException InvalidArgumentException
     */
    public function testExceptionWhenRequestUriIsNotSet()
    {
        $request = new Request;
        $request->getServer('REQUEST_URI');
    }

    /**
     * @covers            Request::__call
     * @expectedException BadMethodCallException
     */
    public function testExceptionWhenIllegalVariableTypeIsRequested()
    {
        $request = new Request;
        $request->getFoo('bar');
    }
}
