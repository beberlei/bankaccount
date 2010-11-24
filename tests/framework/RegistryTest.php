<?php
class RegistryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Registry::__construct
     * @covers Registry::getInstance
     */
    public function testRegistryIsSingleton()
    {
        $this->assertSame(Registry::getInstance(), Registry::getInstance());
    }

    /**
     * @covers Registry::register
     */
    public function testObjectCanBeRegistered()
    {
        $o = new stdClass;

        $registry = Registry::getInstance();
        $registry->register('foo', $o);

        $this->assertAttributeEquals(array('foo' => $o), 'objects', $registry);
    }

    /**
     * @covers  Registry::getObject
     * @depends testObjectCanBeRegistered
     */
    public function testObjectCanBeRetrieved()
    {
        $this->assertType(
          'stdClass', Registry::getInstance()->getObject('foo')
        );
    }

    /**
     * @covers Registry::getObject
     */
    public function testNullIsReturnedWhenObjectCannotBeRetrieved()
    {
        $this->assertNull(Registry::getInstance()->getObject('bar'));
    }
}
