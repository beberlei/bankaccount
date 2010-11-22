<?php
class Response
{
    protected $headers = array();
    protected $data = array();

    public function addHeader($header)
    {
        $this->headers[] = $header;
    }

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getData()
    {
        return $this->data;
    }
}
