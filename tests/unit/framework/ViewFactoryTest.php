<?php
use bankaccount\framework\http\Response;
use bankaccount\framework\view\Factory;

/**
 * @small
 */
class ViewFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\view\Factory::getView
     */
    public function testDefaultViewCanBeConstructed()
    {
        $viewFactory = new Factory;

        $this->assertInstanceOf(
          'StdClass',
          $viewFactory->getView('StdClass', new Response)
        );
    }
}
