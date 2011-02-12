<?php
/**
 * @small
 */
class MapperFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $mapperFactory;

    /**
     * @covers MapperFactory::__construct
     */
    protected function setUp()
    {
        $this->mapperFactory = new MapperFactory(new PDO('sqlite::memory:'));
    }

    /**
     * @covers MapperFactory::getMapper
     */
    public function testBankAccountMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'BankAccountMapper',
          $this->mapperFactory->getMapper('BankAccountMapper')
        );
    }

    /**
     * @covers MapperFactory::getMapper
     */
    public function testDefaultMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'StdClass',
          $this->mapperFactory->getMapper('StdClass')
        );
    }
}
