<?php
namespace bankaccount\framework\factory;

class ControllerFactory
{
    protected $mapperFactory;

    public function __construct(MapperFactory $mapperFactory)
    {
        $this->mapperFactory = $mapperFactory;
    }

    public function getController($name)
    {
        switch ($name) {
            case 'BankAccount': {
                return new \bankaccount\controller\BankAccount(
                  $this->mapperFactory->getMapper('BankAccount')
                );
            }
            break;

            case 'BankAccountList': {
                return new \bankaccount\controller\BankAccountList(
                  $this->mapperFactory->getMapper('BankAccount')
                );
            }
            break;

            default: {
                return new $name;
            }
        }
    }
}
