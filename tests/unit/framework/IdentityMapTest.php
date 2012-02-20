<?php
use bankaccount\framework\mapper\IdentityMap;

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
     * @covers bankaccount\framework\mapper\IdentityMap::__construct
     */
    public function testIsInitiallyEmpty()
    {
        $map = new IdentityMap;
        $this->assertAttributeEmpty('idToObject', $map);
        $this->assertAttributeCount(0, 'objectToId', $map);

        return $map;
    }

    /**
     * @covers  bankaccount\framework\mapper\IdentityMap::set
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
     * @covers  bankaccount\framework\mapper\IdentityMap::getObject
     * @covers  bankaccount\framework\mapper\IdentityMap::hasId
     * @depends testObjectCanBeAdded
     */
    public function testObjectCanBeRetrievedById(IdentityMap $map)
    {
        $this->assertSame(self::$object, $map->getObject(1));
    }

    /**
     * @covers            bankaccount\framework\mapper\IdentityMap::getObject
     * @depends           testObjectCanBeAdded
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedForNonExistantId(IdentityMap $map)
    {
        $map->getObject(0);
    }

    /**
     * @covers  bankaccount\framework\mapper\IdentityMap::getId
     * @covers  bankaccount\framework\mapper\IdentityMap::hasObject
     * @depends testObjectCanBeAdded
     */
    public function testIdCanBeRetrievedForObject(IdentityMap $map)
    {
        $this->assertEquals(1, $map->getId(self::$object));
    }

    /**
     * @covers            bankaccount\framework\mapper\IdentityMap::getId
     * @depends           testObjectCanBeAdded
     * @expectedException OutOfBoundsException
     */
    public function testExceptionIsRaisedForNonExistantObject(IdentityMap $map)
    {
        $map->getId(new StdClass);
    }
}
