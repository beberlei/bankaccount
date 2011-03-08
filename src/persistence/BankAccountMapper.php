<?php

interface BankAccountMapper
{
    public function getAllIds();
    
    public function findById($id);
    
    public function insert(BankAccount $ba);
    
    public function update(BankAccount $ba);
    
    public function delete(BankAccount $ba);
}
