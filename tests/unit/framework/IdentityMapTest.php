<?php
/**
 * @small
 */
class IdentityMapTest extends PHPUnit_Framework_TestCase
{
    protected static $object;

    public static function setUpBeforeClass()
    {
        self::$object = new StdClass;
    }

    /**
     * @covers IdentityMap::__construct
     */
    public function testIsInitiallyEmpty()
    {
        $map = new IdentityMap;
        $this->assertAttributeEmpty('idToObject', $map);
        $this->assertAttributeCount(0, 'objectToId', $map);

        return $map;
    }

    /**
     * @covers  IdentityMap::set
     * @depends testIsInitiallyEmpty
     */
    public function testObjectCanBeAdded(IdentityMap $map)
    {
        $map->set(1, self::$object);

        $idToObject = $this->readAttribute($map, 'idToObject');
        $objectToId = $this->readAttribute($map, 'objectToId');

        $this->assertContains(self::$object, $idToObject);
        $this->assertContains(self::$object, $objectToId);

        return $map;
    }

    /**
     * @covers  IdentityMap::getObject
     * @covers  IdentityMap::hasId
     * @depends testObjectCanBeAdded
     */
    public function testObjectCanBeRetrievedById(IdentityMap $map)
    {
        $this->assertSame(self::$object, $map->getObject(1));
    }

    /**
     * @covers            IdentityMap::getObject
     * @depends           testObjectCanBeAdded
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedForNonExistantId(IdentityMap $map)
    {
        $map->getObject(0);
    }

    /**
     * @covers  IdentityMap::getId
     * @covers  IdentityMap::hasObject
     * @depends testObjectCanBeAdded
     */
    public function testIdCanBeRetrievedForObject(IdentityMap $map)
    {
        $this->assertEquals(1, $map->getId(self::$object));
    }

    /**
     * @covers            IdentityMap::getId
     * @depends           testObjectCanBeAdded
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedForNonExistantObject(IdentityMap $map)
    {
        $map->getId(new StdClass);
    }
}
