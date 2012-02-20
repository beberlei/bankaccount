<?php
use bankaccount\framework\controller\ControllerInterface;
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;

class TestController implements ControllerInterface
{
    public function execute(Request $request, Response $response)
    {
        return 'TestView';
    }
}
