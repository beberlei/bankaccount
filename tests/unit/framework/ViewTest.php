<?php
/**
 * @medium
 */
class ViewTest extends PHPUnit_Framework_TestCase
{
    protected $response;
    protected $view;

    /**
     * @covers View::__construct
     */
    protected function setUp()
    {
        $this->response = new Response;
        $this->view     = $this->getMockBuilder('View')
                               ->setConstructorArgs(array($this->response))
                               ->getMockForAbstractClass();
    }

    public function testViewObjectCanBeConstructed()
    {
        $this->assertAttributeSame($this->response, 'response', $this->view);
    }
}
