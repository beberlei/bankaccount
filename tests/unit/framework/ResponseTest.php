<?php
use bankaccount\framework\http\Response;

/**
 * @small
 */
class ResponseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\http\Response::getHeaders
     */
    public function testNoHeadersAreInitiallySet()
    {
        $response = new Response;
        $this->assertEmpty($response->getHeaders());

        return $response;
    }

    /**
     * @covers  bankaccount\framework\http\Response::addHeader
     * @depends testNoHeadersAreInitiallySet
     */
    public function testAddingHeadersWorks(Response $response)
    {
        $response->addHeader('HTTP/1.0 404 Not Found');

        $this->assertContains(
          'HTTP/1.0 404 Not Found', $response->getHeaders()
        );
    }
}
