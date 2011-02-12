<?php
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
            case 'BankAccountController': {
                return new BankAccountController(
                  $this->mapperFactory->getMapper('BankAccountMapper')
                );
            }
            break;

            case 'BankAccountListController': {
                return new BankAccountListController(
                  $this->mapperFactory->getMapper('BankAccountMapper')
                );
            }
            break;

            default: {
                return new $name;
            }
        }
    }
}
