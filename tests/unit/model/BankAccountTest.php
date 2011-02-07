<?php
class BankAccountTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers BankAccount::getBalance
     */
    public function testBalanceIsInitiallyZero()
    {
        $ba = new BankAccount;
        $this->assertEquals(0, $ba->getBalance());

        return $ba;
    }

    /**
     * @covers BankAccount::setBalance
     */
    public function testBalanceCanBeSet()
    {
        $ba = new BankAccount;
        $ba->setBalance(1);

        $this->assertEquals(1, $ba->getBalance());
    }

    /**
     * @covers            BankAccount::setBalance
     * @covers            BankAccountException
     * @depends           testBalanceIsInitiallyZero
     * @expectedException BankAccountException
     */
    public function testBalanceCannotBecomeNegative(BankAccount $ba)
    {
        $ba->setBalance(-1);
    }

    /**
     * @covers            BankAccount::withdrawMoney
     * @covers            BankAccountException
     * @depends           testBalanceIsInitiallyZero
     * @expectedException BankAccountException
     */
    public function testBalanceCannotBecomeNegative2(BankAccount $ba)
    {
        $ba->withdrawMoney(1);
    }

    /**
     * @covers            BankAccount::depositMoney
     * @covers            BankAccountException
     * @depends           testBalanceIsInitiallyZero
     * @expectedException BankAccountException
     */
    public function testBalanceCannotBecomeNegative3(BankAccount $ba)
    {
        $ba->depositMoney(-1);
    }

    /**
     * @covers BankAccount::getId
     */
    public function testIdIsInitiallyNull()
    {
        $ba = new BankAccount;
        $this->assertEquals(NULL, $ba->getId());

        return $ba;
    }

    /**
     * @covers  BankAccount::setId
     * @depends testIdIsInitiallyNull
     */
    public function testIdCanBeSet(BankAccount $ba)
    {
        $ba->setId(1);

        $this->assertEquals(1, $ba->getId());
    }

    /**
     * @depends testBalanceIsInitiallyZero
     * @covers  BankAccount::depositMoney
     */
    public function testDepositingMoneyWorks(BankAccount $ba)
    {
        $ba->depositMoney(1);
        $this->assertEquals(1, $ba->getBalance());

        return $ba;
    }

    /**
     * @depends testDepositingMoneyWorks
     * @covers  BankAccount::withdrawMoney
     */
    public function testWithdrawingMoneyWorks(BankAccount $ba)
    {
        $ba->withdrawMoney(1);
        $this->assertEquals(0, $ba->getBalance());
    }
}
