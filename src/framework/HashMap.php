<?php
class HashMap
{
    protected $values = array();

    public function set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function get($key)
    {
        if (!isset($this->values[$key])) {
            throw new OutOfBoundsException;
        }

        return $this->values[$key];
    }
}
