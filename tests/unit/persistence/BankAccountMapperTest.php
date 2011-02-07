<?php
class BankAccountMapperTest extends PHPUnit_Extensions_Database_TestCase
{
    protected $db;
    protected $mapper;

    /**
     * @covers BankAccountMapper::__construct
     */
    protected function setUp()
    {
        $this->db     = new PDO('sqlite::memory:');
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
     * @covers BankAccountMapper::getAllIds
     */
    public function testListOfBankAccountIdsCanBeRetrieved()
    {
        $this->assertEquals(array(1, 2), $this->mapper->getAllIds());
    }

    /**
     * @covers BankAccountMapper::findById
     */
    public function testBankAccountCanBeFoundById()
    {
        $ba = $this->mapper->findById(1);

        $this->assertEquals(1.0, $ba->getBalance());
        $this->assertEquals(1, $ba->getId());
    }

    /**
     * @covers BankAccountMapper::insert
     */
    public function testBankAccountCanBeInserted()
    {
        $this->mapper->insert(new BankAccount);

        $this->assertDataSetsEqual(
          $this->createFlatXMLDataSet(
            __DIR__ . '/fixture/bankaccount-after-insert.xml'
          ),
          $this->getConnection()->createDataSet()
        );
    }

    /**
     * @covers BankAccountMapper::update
     */
    public function testBankAccountCanBeUpdated()
    {
        $ba = $this->mapper->findById(1);
        $ba->setBalance(0);

        $this->mapper->update($ba);

        $this->assertDataSetsEqual(
          $this->createFlatXMLDataSet(
            __DIR__ . '/fixture/bankaccount-after-update.xml'
          ),
          $this->getConnection()->createDataSet()
        );
    }

    /**
     * @covers BankAccountMapper::delete
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
}
