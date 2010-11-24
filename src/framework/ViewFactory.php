<?php
class ViewFactory
{
    public function getView($name, Request $request, Response $response)
    {
        switch ($name) {
            default: {
                return new $name($request, $response);
            }
        }
    }
}
