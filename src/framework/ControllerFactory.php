<?php
class ControllerFactory
{
    public function getController($name)
    {
        switch ($name) {
            case 'DefaultController': {
                return new DefaultController(
                  new BankAccountMapper(
                    Registry::getInstance()->getObject('pdo')
                  )
                );
            }
            break;

            default: {
                return new $name;
            }
        }
    }
}
