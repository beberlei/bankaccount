<?php
class Router
{
    protected $map = array();

    public function addRoute($key, $value)
    {
        $this->map[$key] = $value;
    }

    public function route(Request $request)
    {
        $uri = $request->server('REQUEST_URI');

        if (isset($this->map[$uri])) {
            return new $this->map[$uri];
        }

        throw new RuntimeException;
    }
}
