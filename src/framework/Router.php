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
        $parts = explode('/', $request->getServer('REQUEST_URI'));
        unset($parts[0]);

        $controller = array_shift($parts);

        if (!isset($this->values[$controller])) {
            throw new RuntimeException;
        }

        if (!empty($parts)) {
            $request->set('action', array_shift($parts));
        } else {
            $request->set('action', 'default');
        }

        if (count($parts) % 2 != 0) {
            throw new RuntimeException;
        }

        $keys = array_keys($parts);

        for ($i = 0; $i < count($keys); $i += 2) {
            $request->set($parts[$keys[$i]], $parts[$keys[$i+1]]);
        }

        return $this->factory->getController($this->values[$controller]);
    }
}
