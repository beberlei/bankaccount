<?php
/**
 * @medium
 */
class BankAccountViewTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers BankAccountView::render
     */
    public function testIsRenderedCorrectly()
    {
        $request = new Request;
        $request->set('id', 1);

        $response = new Response;
        $response->set('balance', 0);

        $view = new BankAccountView($request, $response);

        $this->assertEquals(
          "The balance of bank account #1 is 0.00.\n", $view->render()
        );
    }
}
