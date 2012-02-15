<?php
use bankaccount\framework\controller\ControllerInterface;
use bankaccount\framework\Request;
use bankaccount\framework\Response;

class TestController implements ControllerInterface
{
    public function execute(Request $request, Response $response)
    {
        return new TestView($response);
    }
}
