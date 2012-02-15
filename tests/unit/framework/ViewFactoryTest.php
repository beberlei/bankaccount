<?php
use bankaccount\framework\view\Factory;
use bankaccount\framework\Response;

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
