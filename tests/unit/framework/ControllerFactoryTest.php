<?php
/**
 * @small
 */
class ControllerFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $controllerFactory;

    /**
     * @covers ControllerFactory::__construct
     */
    protected function setUp()
    {
        $mapper = $this->getMockBuilder('BankAccountMapper')
                       ->disableOriginalConstructor()
                       ->getMock();

        $mapperFactory = $this->getMockBuilder('MapperFactory')
                              ->disableOriginalConstructor()
                              ->getMock();

        $mapperFactory->expects($this->any())
                      ->method('getMapper')
                      ->will($this->returnValue($mapper));

        $this->controllerFactory = new ControllerFactory($mapperFactory);
    }

    /**
     * @covers ControllerFactory::getController
     */
    public function testBankAccountControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'BankAccountController',
          $this->controllerFactory->getController('BankAccountController')
        );
    }

    /**
     * @covers ControllerFactory::getController
     */
    public function testBankAccountListControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'BankAccountListController',
          $this->controllerFactory->getController('BankAccountListController')
        );
    }

    /**
     * @covers ControllerFactory::getController
     */
    public function testDefaultControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'StdClass',
          $this->controllerFactory->getController('StdClass')
        );
    }
}
