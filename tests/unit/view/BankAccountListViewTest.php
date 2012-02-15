<?php
use bankaccount\view\BankAccountList;

/**
 * @small
 */
class BankAccountListViewTest extends ViewTestCase
{
    /**
     * @covers bankaccount\view\BankAccountList::render
     */
    public function testIsRenderedCorrectly()
    {
        $this->response->expects($this->once())
                       ->method('get')
                       ->with($this->equalTo('ids'))
                       ->will($this->returnValue(array(1)));

        $view = new BankAccountList($this->response);

        $this->assertEquals(
          '<ul><li><a href="/bankaccount/id/1">Bank Account #1</a></li></ul>',
          $view->render()
        );
    }
}
