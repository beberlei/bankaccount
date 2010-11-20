<?php
class DefaultController extends Controller
{
    public function execute(Request $request, Response $response)
    {
        return new DefaultView($request, $response);
    }
}
