<?php
use bankaccount\framework\factory\ControllerFactory;

/**
 * @small
 */
class ControllerFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $controllerFactory;

    /**
     * @covers bankaccount\framework\factory\ControllerFactory::__construct
     */
    protected function setUp()
    {
        $mapper = $this->getMockBuilder('bankaccount\\mapper\\BankAccount')
                       ->disableOriginalConstructor()
                       ->getMock();

        $mapperFactory = $this->getMockBuilder('bankaccount\\framework\\factory\\MapperFactory')
                              ->disableOriginalConstructor()
                              ->getMock();

        $mapperFactory->expects($this->any())
                      ->method('getMapper')
                      ->will($this->returnValue($mapper));

        $this->controllerFactory = new ControllerFactory($mapperFactory);
    }

    /**
     * @covers bankaccount\framework\factory\ControllerFactory::getController
     */
    public function testBankAccountControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          '\bankaccount\controller\BankAccount',
          $this->controllerFactory->getController('BankAccount')
        );
    }

    /**
     * @covers bankaccount\framework\factory\ControllerFactory::getController
     */
    public function testBankAccountListControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          '\bankaccount\controller\BankAccountList',
          $this->controllerFactory->getController('BankAccountList')
        );
    }

    /**
     * @covers bankaccount\framework\factory\ControllerFactory::getController
     */
    public function testDefaultControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'StdClass',
          $this->controllerFactory->getController('StdClass')
        );
    }
}
