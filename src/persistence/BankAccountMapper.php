<?php
class BankAccountMapper
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
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
        $ba->setBalance($balance);
        $ba->setId($id);

        return $ba;
    }

    public function insert(BankAccount $ba)
    {
        $this->db->exec(
          sprintf(
            'INSERT INTO bankaccount (balance) VALUES(%f);',
            $ba->getBalance()
          )
        );

        $ba->setId((int)$this->db->lastInsertId());
    }

    public function update(BankAccount $ba)
    {
        $this->db->exec(
          sprintf(
            'UPDATE bankaccount SET balance = %f WHERE id = %d;',
            $ba->getBalance(),
            $ba->getId()
          )
        );
    }

    public function delete(BankAccount $ba)
    {
        $this->db->exec(
          sprintf(
            'DELETE FROM bankaccount WHERE id = %d;',
            $ba->getId()
          )
        );
    }
}
