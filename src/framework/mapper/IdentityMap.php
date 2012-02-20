<?php
namespace bankaccount\framework\mapper;

class IdentityMap
{
    protected $idToObject = array();
    protected $objectToId;

    public function __construct()
    {
        $this->objectToId = new \SplObjectStorage;
    }

    public function set($id, $object)
    {
        $this->idToObject[$id]     = $object;
        $this->objectToId[$object] = $id;
    }

    public function hasObject($object)
    {
        return isset($this->objectToId[$object]);
    }

    public function getId($object)
    {
        if (!$this->hasObject($object)) {
            throw new \OutOfBoundsException;
        }

        return $this->objectToId[$object];
    }

    public function hasId($id)
    {
        return isset($this->idToObject[$id]);
    }

    public function getObject($id)
    {
        if (!$this->hasId($id)) {
            throw new \OutOfBoundsException;
        }

        return $this->idToObject[$id];
    }
}
