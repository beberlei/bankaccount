<?php
use bankaccount\framework\HashMap;

/**
 * @small
 */
class HashMapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\HashMap::get
     */
    public function testIsInitiallyEmpty()
    {
        $store = new HashMap;
        $this->assertAttributeEmpty('values', $store);

        return $store;
    }

    /**
     * @covers  bankaccount\framework\HashMap::set
     * @covers  bankaccount\framework\HashMap::get
     * @depends testIsInitiallyEmpty
     */
    public function testSettingDataWorks(HashMap $store)
    {
        $store->set('foo', 'bar');

        $this->assertEquals('bar', $store->get('foo'));
    }

    /**
     * @covers            bankaccount\framework\HashMap::get
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedWhenAccessingAnElementThatDoesNotExist()
    {
        $store = new HashMap;
        $store->get('foo');
    }
}
