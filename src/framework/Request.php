<?php
class Request
{
    protected $data;

    public function __construct(array $server = array(),
                                array $get    = array(),
                                array $post   = array(),
                                array $cookie = array(),
                                array $files  = array(),
                                array $env    = array())
    {
        $this->data['server'] = $server;
        $this->data['get']    = $get;
        $this->data['post']   = $post;
        $this->data['cookie'] = $cookie;
        $this->data['files']  = $files;
        $this->data['env']    = $env;
    }

    public function __call($type, array $arguments)
    {
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
