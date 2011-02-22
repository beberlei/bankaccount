<?php
class TestController implements Controller
{
    public function execute(Request $request, Response $response)
    {
        return new TestView($request, $response);
    }
}
