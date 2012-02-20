<?php
use bankaccount\framework\factory\MapperFactory;

/**
 * @small
 */
class MapperFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $mapperFactory;

    /**
     * @covers bankaccount\framework\factory\MapperFactory::__construct
     */
    protected function setUp()
    {
        $this->mapperFactory = new MapperFactory(new PDO('sqlite::memory:'));
    }

    /**
     * @covers bankaccount\framework\factory\MapperFactory::getMapper
     */
    public function testBankAccountMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\\mapper\\BankAccount',
          $this->mapperFactory->getMapper('BankAccount')
        );
    }

    /**
     * @covers bankaccount\framework\factory\MapperFactory::getMapper
     */
    public function testDefaultMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'StdClass',
          $this->mapperFactory->getMapper('StdClass')
        );
    }
}
