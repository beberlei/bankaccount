<?php
class Router extends HashMap
{
    protected $factory;

    public function __construct(ControllerFactory $factory)
    {
        $this->factory = $factory;
    }

    public function route(Request $request)
    {
        $uri = $request->getServer('REQUEST_URI');

        if (isset($this->values[$uri])) {
            return $this->factory->getController($this->values[$uri]);
        }

        throw new RuntimeException;
    }
}
