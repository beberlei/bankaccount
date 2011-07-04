<?php
/**
 * @package    bankaccount
 * @subpackage framework
 */
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
