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
        return $this->values[$key];
    }
}
