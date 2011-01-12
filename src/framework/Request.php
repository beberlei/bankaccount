<?php
class Request extends HashMap
{
    protected $data;

    public function __construct(array $server = array(),
                                array $get    = array(),
                                array $post   = array(),
                                array $cookie = array(),
                                array $files  = array(),
                                array $env    = array())
    {
        $this->data['Server'] = $server;
        $this->data['Get']    = $get;
        $this->data['Post']   = $post;
        $this->data['Cookie'] = $cookie;
        $this->data['Files']  = $files;
        $this->data['Env']    = $env;
    }

    public function __call($type, array $arguments)
    {
        $type = substr($type, 3);

        if (!isset($this->data[$type])) {
            throw new BadMethodCallException;
        }

        if (empty($arguments) ||
            !isset($this->data[$type][$arguments[0]])) {
            throw new InvalidArgumentException;
        }

        return $this->data[$type][$arguments[0]];
    }
}
