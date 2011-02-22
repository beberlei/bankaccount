<?php
/**
 * @small
 */
class BankAccountListViewTest extends PHPUnit_Framework_TestCase
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
     * @covers BankAccountListView::render
     */
    public function testIsRenderedCorrectly()
    {
        $this->response->expects($this->once())
                       ->method('get')
                       ->with($this->equalTo('ids'))
                       ->will($this->returnValue(array(1)));

        $view = new BankAccountListView($this->request, $this->response);

        $this->assertEquals(
          '<ul><li><a href="/bankaccount/id/1">Bank Account #1</a></li></ul>',
          $view->render()
        );
    }
}
