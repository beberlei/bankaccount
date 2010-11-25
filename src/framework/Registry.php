<?php
class Registry
{
    private static $uniqueInstance = NULL;
    protected $objects = array();

    protected function __construct()
    {
    }

    // @codeCoverageIgnoreStart
    private final function __clone()
    {
    }
    // @codeCoverageIgnoreEnd

    public static function getInstance()
    {
        if (self::$uniqueInstance === NULL) {
            self::$uniqueInstance = new Registry;
        }

        return self::$uniqueInstance;
    }

    public function register($name, $object)
    {
        $this->objects[$name] = $object;
    }

    public function getObject($name)
    {
        if (isset($this->objects[$name])) {
            return $this->objects[$name];
        }
    }
}
