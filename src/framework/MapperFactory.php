<?php
class MapperFactory
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getMapper($name)
    {
        switch ($name) {
            case 'BankAccountMapper': {
                return new BankAccountMapper($this->pdo);
            }
            break;

            default: {
                return new $name;
            }
        }
    }
}
