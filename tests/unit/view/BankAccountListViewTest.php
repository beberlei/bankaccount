<?php
/**
 * @small
 */
class BankAccountListViewTest extends ViewTestCase
{
    /**
     * @covers BankAccountListView::render
     */
    public function testIsRenderedCorrectly()
    {
        $this->response->expects($this->once())
                       ->method('get')
                       ->with($this->equalTo('ids'))
                       ->will($this->returnValue(array(1)));

        $view = new BankAccountListView($this->response);

        $this->assertEquals(
          '<ul><li><a href="/bankaccount/id/1">Bank Account #1</a></li></ul>',
          $view->render()
        );
    }
}
