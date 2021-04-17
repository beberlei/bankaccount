<?php
use bankaccount\mapper\BankAccount as BankAccountMapper;

/**
 * @large
 */
class BankAccountMapperTest extends PHPUnit_Extensions_Database_TestCase
{
    protected $db;
    protected $mapper;

    /**
     * @covers bankaccount\mapper\BankAccount::__construct
     */
    protected function setUp()
    {
        $this->db     = new \PDO('sqlite::memory:');
        $this->mapper = new BankAccountMapper($this->db);

        $this->db->exec(
          file_get_contents(__DIR__ . '/../../../database/bankaccount.sql')
        );

        parent::setUp();
    }

    public function getConnection()
    {
        return $this->createDefaultDBConnection($this->db, ':memory:');
    }

    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(
          __DIR__ . '/fixture/bankaccount-seed.xml'
        );
    }

    /**
     * @covers bankaccount\mapper\BankAccount::getAllIds
     */
    public function testListOfBankAccountIdsCanBeRetrieved()
    {
        $this->assertEquals(array(1, 2), $this->mapper->getAllIds());
    }

    /**
     * @covers bankaccount\mapper\BankAccount::findById
     */
    public function testBankAccountCanBeFoundById()
    {
        $ba = $this->mapper->findById(1);
        $this->assertEquals(1.0, $ba->getBalance());

        $ba = $this->mapper->findById(2);
        $this->assertEquals(2.0, $ba->getBalance());

        $this->assertSame($ba, $this->mapper->findById(2));
    }

    /**
     * @covers            bankaccount\mapper\BankAccount::findById
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedWhenBankAccountCannotBeFoundById()
    {
        $this->mapper->findById(3);
    }

    /**
     * @covers bankaccount\mapper\BankAccount::insert
     */
    public function testBankAccountCanBeInserted()
    {
        $this->mapper->insert(new bankaccount\model\BankAccount);

        $this->assertDataSetsEqual(
          $this->createFlatXMLDataSet(
            __DIR__ . '/fixture/bankaccount-after-insert.xml'
          ),
          $this->getConnection()->createDataSet()
        );
    }

    /**
     * @covers            bankaccount\mapper\BankAccount::insert
     * @covers            bankaccount\framework\mapper\Exception
     * @expectedException bankaccount\framework\mapper\Exception
     */
    public function testBankAccountCannotBeInsertedTwice()
    {
        $ba = new bankaccount\model\BankAccount;

        $this->mapper->insert($ba);
        $this->mapper->insert($ba);
    }

    /**
     * @covers bankaccount\mapper\BankAccount::update
     */
    public function testBankAccountCanBeUpdated()
    {
        $ba = $this->mapper->findById(1);
        $ba->withdrawMoney(1);

        $this->mapper->update($ba);

        $this->assertDataSetsEqual(
          $this->createFlatXMLDataSet(
            __DIR__ . '/fixture/bankaccount-after-update.xml'
          ),
          $this->getConnection()->createDataSet()
        );
    }

    /**
     * @covers            bankaccount\mapper\BankAccount::update
     * @covers            bankaccount\framework\mapper\Exception
     * @expectedException bankaccount\framework\mapper\Exception
     */
    public function testBankAccountThatDoesNotExistCannotBeUpdated()
    {
        $ba = new bankaccount\model\BankAccount;
        $this->mapper->update($ba);
    }

    /**
     * @covers bankaccount\mapper\BankAccount::delete
     */
    public function testBankAccountCanBeDeleted()
    {
        $ba = $this->mapper->findById(1);

        $this->mapper->delete($ba);

        $this->assertDataSetsEqual(
          $this->createFlatXMLDataSet(
            __DIR__ . '/fixture/bankaccount-after-delete.xml'
          ),
          $this->getConnection()->createDataSet()
        );
    }

    /**
     * @covers            bankaccount\mapper\BankAccount::delete
     * @covers            bankaccount\framework\mapper\Exception
     * @expectedException bankaccount\framework\mapper\Exception
     */
    public function testBankAccountThatDoesNotExistCannotBeDeleted()
    {
        $ba = new bankaccount\model\BankAccount;
        $this->mapper->delete($ba);
    }
}
