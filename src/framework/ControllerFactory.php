<?php
class ControllerFactory
{
    public function getController($name)
    {
        switch ($name) {
            case 'DefaultController': {
                return new DefaultController(
                  Registry::getInstance()->getObject('BankAccountMapper')
                );
            }
            break;

            default: {
                return new $name;
            }
        }
    }
}
