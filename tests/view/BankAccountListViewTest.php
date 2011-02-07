<?php
class BankAccountListViewTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers BankAccountListView::render
     */
    public function testIsRenderedCorrectly()
    {
        $request = new Request(array('REQUEST_URI' => '/bankaccount'));

        $response = new Response;
        $response->set('ids', array(1));

        $view = new BankAccountListView($request, $response);

        $this->assertEquals(
          '<ul><li><a href="/bankaccount/show/id/1">Bank Account #1</a></li></ul>',
          $view->render()
        );
    }
}
