<?php
class TestController extends Controller
{
    public function execute(Request $request, Response $response)
    {
        return new TestView($request, $response);
    }
}
