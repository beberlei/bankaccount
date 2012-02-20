<?php
namespace bankaccount\framework\view;

use bankaccount\framework\http\Response;

class Factory
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
