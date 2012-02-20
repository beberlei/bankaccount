<?php
namespace bankaccount\mapper;

use bankaccount\framework\mapper\IdentityMap;
use bankaccount\framework\mapper\Exception;

class BankAccount
{
    protected $db;
    protected $identityMap;

    public function __construct(\PDO $db)
    {
        $this->db          = $db;
        $this->identityMap = new IdentityMap;
    }

    public function getAllIds()
    {
        $result = array();

        foreach ($this->db->query('SELECT id FROM bankaccount;') as $row) {
            $result[] = $row['id'];
        }

        return $result;
    }

    public function findById($id)
    {
        if ($this->identityMap->hasId($id)) {
            return $this->identityMap->getObject($id);
        }

        $result = $this->db->query(
          sprintf(
            'SELECT balance FROM bankaccount WHERE id = %d;',
            $id
          )
        );

        $balance = $result->fetchColumn();

        if (!$balance) {
            throw new \OutOfBoundsException(
              sprintf('No bank account with id #%d exists.', $id)
            );
        }

        $ba = new \bankaccount\model\BankAccount;

        $attribute = new \ReflectionProperty($ba, 'balance');
        $attribute->setAccessible(TRUE);
        $attribute->setValue($ba, $balance);

        $this->identityMap->set($id, $ba);

        return $ba;
    }

    public function insert(\bankaccount\model\BankAccount $ba)
    {
        if ($this->identityMap->hasObject($ba)) {
            throw new Exception('Object has an ID, cannot insert.');
        }

        $this->db->exec(
          sprintf(
            'INSERT INTO bankaccount (balance) VALUES(%f);',
            $ba->getBalance()
          )
        );

        $this->identityMap->set((int)$this->db->lastInsertId(), $ba);
    }

    public function update(\bankaccount\model\BankAccount $ba)
    {
        if (!$this->identityMap->hasObject($ba)) {
            throw new Exception('Object has no ID, cannot update.');
        }

        $this->db->exec(
          sprintf(
            'UPDATE bankaccount SET balance = %f WHERE id = %d;',
            $ba->getBalance(),
            $this->identityMap->getId($ba)
          )
        );
    }

    public function delete(\bankaccount\model\BankAccount $ba)
    {
        if (!$this->identityMap->hasObject($ba)) {
            throw new Exception('Object has no ID, cannot delete.');
        }

        $this->db->exec(
          sprintf(
            'DELETE FROM bankaccount WHERE id = %d;',
            $this->identityMap->getId($ba)
          )
        );
    }
}
