<?php
namespace bankaccount\framework\factory;

use bankaccount\framework\http\Response;

class ViewFactory
{
    public function getView($name, Response $response)
    {
        switch ($name) {
            default: {
                return new $name($response);
            }
        }
    }
}
