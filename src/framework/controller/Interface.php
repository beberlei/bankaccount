<?php
namespace bankaccount\framework\controller;

use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;

interface ControllerInterface
{
    public function execute(Request $request, Response $response);
}
