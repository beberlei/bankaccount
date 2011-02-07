<?php
class HashMapTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers HashMap::get
     */
    public function testIsInitiallyEmpty()
    {
        $hashMap = $this->getObjectForTrait('HashMap');

        $this->assertAttributeEmpty('values', $hashMap);

        return $hashMap;
    }

    /**
     * @covers  HashMap::set
     * @covers  HashMap::get
     * @depends testIsInitiallyEmpty
     */
    public function testSettingDataWorks($hashMap)
    {
        $hashMap->set('foo', 'bar');

        $this->assertEquals('bar', $hashMap->get('foo'));
    }
}
