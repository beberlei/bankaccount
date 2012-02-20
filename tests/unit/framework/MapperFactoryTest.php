<?php
use bankaccount\framework\mapper\Factory as MapperFactory;

/**
 * @small
 */
class MapperFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $mapperFactory;

    /**
     * @covers bankaccount\framework\mapper\Factory::__construct
     */
    protected function setUp()
    {
        $this->mapperFactory = new MapperFactory(new PDO('sqlite::memory:'));
    }

    /**
     * @covers bankaccount\framework\mapper\Factory::getMapper
     */
    public function testBankAccountMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\\mapper\\BankAccount',
          $this->mapperFactory->getMapper('BankAccount')
        );
    }

    /**
     * @covers bankaccount\framework\mapper\Factory::getMapper
     */
    public function testDefaultMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'StdClass',
          $this->mapperFactory->getMapper('StdClass')
        );
    }
}
