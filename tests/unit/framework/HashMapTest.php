<?php
/**
 * @small
 */
class HashMapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers HashMap::get
     */
    public function testIsInitiallyEmpty()
    {
        $store = new HashMap;
        $this->assertAttributeEmpty('values', $store);

        return $store;
    }

    /**
     * @covers  HashMap::set
     * @covers  HashMap::get
     * @depends testIsInitiallyEmpty
     */
    public function testSettingDataWorks(HashMap $store)
    {
        $store->set('foo', 'bar');

        $this->assertEquals('bar', $store->get('foo'));
    }

    /**
     * @covers            HashMap::get
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedWhenAccessingAnElementThatDoesNotExist()
    {
        $store = new HashMap;
        $store->get('foo');
    }
}
