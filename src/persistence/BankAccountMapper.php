<?php
class BankAccountMapper
{
    protected $db;
    protected $identityMap;

    public function __construct(PDO $db)
    {
        $this->db          = $db;
        $this->identityMap = new SplObjectStorage;
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
        $this->identityMap->rewind();

        while ($this->identityMap->valid()) {
            if ($this->identityMap->getInfo() == $id) {
                return $this->identityMap->current();
            }

            $this->identityMap->next();
        }

        $result = $this->db->query(
          sprintf(
            'SELECT balance FROM bankaccount WHERE id = %d;',
            $id
          )
        );

        $balance = $result->fetchColumn();

        if (!$balance) {
            throw new OutOfBoundsException(
              sprintf('No bank account with id #%d exists.', $id)
            );
        }

        $ba = new BankAccount;

        $attribute = new ReflectionProperty($ba, 'balance');
        $attribute->setAccessible(TRUE);
        $attribute->setValue($ba, $balance);

        $this->identityMap[$ba] = $id;

        return $ba;
    }

    public function insert(BankAccount $ba)
    {
        if (isset($this->identityMap[$ba])) {
            throw new MapperException('Object has an ID, cannot insert.');
        }

        $this->db->exec(
          sprintf(
            'INSERT INTO bankaccount (balance) VALUES(%f);',
            $ba->getBalance()
          )
        );

        $this->identityMap[$ba] = (int)$this->db->lastInsertId();
    }

    public function update(BankAccount $ba)
    {
        if (!isset($this->identityMap[$ba])) {
            throw new MapperException('Object has no ID, cannot update.');
        }

        $this->db->exec(
          sprintf(
            'UPDATE bankaccount SET balance = %f WHERE id = %d;',
            $ba->getBalance(),
            $this->identityMap[$ba]
          )
        );
    }

    public function delete(BankAccount $ba)
    {
        if (!isset($this->identityMap[$ba])) {
            throw new MapperException('Object has no ID, cannot delete.');
        }

        $this->db->exec(
          sprintf(
            'DELETE FROM bankaccount WHERE id = %d;',
            $this->identityMap[$ba]
          )
        );

        unset($this->identityMap[$ba]);
    }
}
