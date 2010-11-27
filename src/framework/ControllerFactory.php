<?php
class ControllerFactory
{
    public function getController($name)
    {
        switch ($name) {
            case 'BankAccountController': {
                return new BankAccountController(
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
