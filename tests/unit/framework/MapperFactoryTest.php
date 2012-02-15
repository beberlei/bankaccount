<?php
use bankaccount\framework\persistence\Factory as MapperFactory;

/**
 * @small
 */
class MapperFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $mapperFactory;

    /**
     * @covers bankaccount\framework\persistence\Factory::__construct
     */
    protected function setUp()
    {
        $this->mapperFactory = new MapperFactory(new PDO('sqlite::memory:'));
    }

    /**
     * @covers bankaccount\framework\persistence\Factory::getMapper
     */
    public function testBankAccountMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\\mapper\\BankAccount',
          $this->mapperFactory->getMapper('BankAccount')
        );
    }

    /**
     * @covers bankaccount\framework\persistence\Factory::getMapper
     */
    public function testDefaultMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'StdClass',
          $this->mapperFactory->getMapper('StdClass')
        );
    }
}
