<?php
class Router
{
    protected $factory;
    protected $map = array();

    public function __construct(ControllerFactory $factory)
    {
        $this->factory = $factory;
    }

    public function addRoute($key, $value)
    {
        $this->map[$key] = $value;
    }

    public function route(Request $request)
    {
        $uri = $request->server('REQUEST_URI');

        if (isset($this->map[$uri])) {
            return $this->factory->getController($this->map[$uri]);
        }

        throw new RuntimeException;
    }
}
