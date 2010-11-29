<?php
class BankAccount
{
    protected $balance = 0;
    protected $id;

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        if ($balance < 0) {
            throw new BankAccountException;
        }

        $this->balance = $balance;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function depositMoney($amount)
    {
        $this->setBalance($this->getBalance() + $amount);

        return $this->getBalance();
    }

    public function withdrawMoney($amount)
    {
        $this->setBalance($this->getBalance() - $amount);

        return $this->getBalance();
    }
}
