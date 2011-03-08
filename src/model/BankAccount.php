<?php
/**
 * @Entity
 */
class BankAccount
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;
    
    /** @Column(type="integer") */
    protected $balance = 0;

    public function getBalance()
    {
        return $this->balance;
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

    protected function setBalance($balance)
    {
        if ($balance < 0) {
            throw new BankAccountException;
        }

        $this->balance = $balance;
    }
}
