<?php
namespace bankaccount\framework\mapper;

class Factory
{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getMapper($name)
    {
        switch ($name) {
            case 'BankAccount': {
                return new \bankaccount\mapper\BankAccount($this->pdo);
            }
            break;

            default: {
                return new $name;
            }
        }
    }
}
