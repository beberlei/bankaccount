<?php
/**
 * @small
 */
class BankAccountViewTest extends PHPUnit_Framework_TestCase
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

    /**
     * @covers BankAccountView::render
     */
    public function testIsRenderedCorrectly()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with($this->equalTo('id'))
                      ->will($this->returnValue(1));

        $this->response->expects($this->once())
                       ->method('get')
                       ->with($this->equalTo('balance'))
                       ->will($this->returnValue(0));

        $view = new BankAccountView($this->request, $this->response);

        $this->assertEquals(
          "The balance of bank account #1 is 0.00.\n", $view->render()
        );
    }
}
