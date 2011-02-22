<?php
interface Controller
{
    public function execute(Request $request, Response $response);
}
