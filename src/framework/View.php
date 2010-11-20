<?php
abstract class View
{
    protected $request;
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request  = $request;
        $this->response = $response;
    }

    abstract public function render();
}
