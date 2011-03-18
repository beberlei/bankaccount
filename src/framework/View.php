<?php
abstract class View
{
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    abstract public function render();
}
