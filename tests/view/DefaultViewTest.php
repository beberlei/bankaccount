<?php
class DefaultViewTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers DefaultView::render
     */
    public function testIsRenderedCorrectly()
    {
        $request = new Request(array(), array('id' => 1));

        $response = new Response;
        $response->setData('balance', 0);

        $view = new DefaultView($request, $response);

        $this->assertEquals(
          "The balance of bank account #1 is 0.00.\n", $view->render()
        );
    }
}
