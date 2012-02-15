<?php
use bankaccount\model\BankAccount;

/**
 * @small
 */
class BankAccountTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\model\BankAccount::getBalance
     */
    public function testBalanceIsInitiallyZero()
    {
        $ba = new BankAccount;
        $this->assertEquals(0, $ba->getBalance());

        return $ba;
    }

    /**
     * @covers            bankaccount\model\BankAccount::withdrawMoney
     * @covers            bankaccount\model\BankAccount::setBalance
     * @covers            bankaccount\model\BankAccountException
     * @depends           testBalanceIsInitiallyZero
     * @expectedException bankaccount\model\BankAccountException
     */
    public function testBalanceCannotBecomeNegative(BankAccount $ba)
    {
        $ba->withdrawMoney(1);
    }

    /**
     * @covers            bankaccount\model\BankAccount::depositMoney
     * @covers            bankaccount\model\BankAccount::setBalance
     * @covers            bankaccount\model\BankAccountException
     * @depends           testBalanceIsInitiallyZero
     * @expectedException bankaccount\model\BankAccountException
     */
    public function testBalanceCannotBecomeNegative2(BankAccount $ba)
    {
        $ba->depositMoney(-1);
    }

    /**
     * @depends testBalanceIsInitiallyZero
     * @covers  bankaccount\model\BankAccount::depositMoney
     * @covers  bankaccount\model\BankAccount::setBalance
     */
    public function testDepositingMoneyWorks(BankAccount $ba)
    {
        $ba->depositMoney(1);
        $this->assertEquals(1, $ba->getBalance());

        return $ba;
    }

    /**
     * @depends testDepositingMoneyWorks
     * @covers  bankaccount\model\BankAccount::withdrawMoney
     */
    public function testWithdrawingMoneyWorks(BankAccount $ba)
    {
        $ba->withdrawMoney(1);
        $this->assertEquals(0, $ba->getBalance());
    }
}
