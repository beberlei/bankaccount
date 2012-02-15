<?php
use bankaccount\framework\view\View;
use bankaccount\framework\Response;

/**
 * @medium
 */
class ViewTest extends PHPUnit_Framework_TestCase
{
    protected $response;
    protected $view;

    /**
     * @covers bankaccount\framework\view\View::__construct
     */
    protected function setUp()
    {
        $this->response = new Response;
        $this->view     = $this->getMockBuilder('bankaccount\\framework\\view\\View')
                               ->setConstructorArgs(array($this->response))
                               ->getMockForAbstractClass();
    }

    public function testViewObjectCanBeConstructed()
    {
        $this->assertAttributeSame($this->response, 'response', $this->view);
    }
}
