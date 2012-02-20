<?php
use bankaccount\framework\controller\Factory as ControllerFactory;

/**
 * @small
 */
class ControllerFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $controllerFactory;

    /**
     * @covers bankaccount\framework\controller\Factory::__construct
     */
    protected function setUp()
    {
        $mapper = $this->getMockBuilder('bankaccount\\mapper\\BankAccount')
                       ->disableOriginalConstructor()
                       ->getMock();

        $mapperFactory = $this->getMockBuilder('bankaccount\\framework\\mapper\\Factory')
                              ->disableOriginalConstructor()
                              ->getMock();

        $mapperFactory->expects($this->any())
                      ->method('getMapper')
                      ->will($this->returnValue($mapper));

        $this->controllerFactory = new ControllerFactory($mapperFactory);
    }

    /**
     * @covers bankaccount\framework\controller\Factory::getController
     */
    public function testBankAccountControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          '\bankaccount\controller\BankAccount',
          $this->controllerFactory->getController('BankAccount')
        );
    }

    /**
     * @covers bankaccount\framework\controller\Factory::getController
     */
    public function testBankAccountListControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          '\bankaccount\controller\BankAccountList',
          $this->controllerFactory->getController('BankAccountList')
        );
    }

    /**
     * @covers bankaccount\framework\controller\Factory::getController
     */
    public function testDefaultControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'StdClass',
          $this->controllerFactory->getController('StdClass')
        );
    }
}
