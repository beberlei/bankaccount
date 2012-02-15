<?php
namespace bankaccount\framework\controller;

use bankaccount\framework\Request;
use bankaccount\framework\Response;

interface ControllerInterface
{
    public function execute(Request $request, Response $response);
}
