<?php

class DoctrineBankAccountMapper implements BankAccountMapper
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    
    public function __construct($em)
    {
        $this->em = $em;
    }
    
    public function delete(BankAccount $ba)
    {
        if (!$this->em->contains($ba)) {
            throw new MapperException();
        }
        
        $this->em->remove($ba);
        $this->em->flush();
    }
    
    public function findById($id)
    {
        $ba = $this->em->find('BankAccount', $id);
        if ($ba === null) {
            throw new OutOfBoundsException();
        }
        return $ba;
    }
    
    public function getAllIds()
    {
        $ids = $this->em->createQuery('SELECT b.id FROM BankAccount b')->getScalarResult();
        return array_map(function($row) { return $row['id']; }, $ids);
    }
    
    public function insert(BankAccount $ba)
    {
        if ($this->em->contains($ba)) {
            throw new MapperException();
        }
        
        $this->em->persist($ba);
        $this->em->flush();
    }
    
    public function update(BankAccount $ba)
    {
        if (!$this->em->contains($ba)) {
            throw new MapperException();
        }
        
        // bank account is tracked by entity manager, just flush!
        $this->em->flush();
    }
}