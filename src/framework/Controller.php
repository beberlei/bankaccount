<?php
abstract class Controller
{
    abstract public function execute(Request $request, Response $response);
}
