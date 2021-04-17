<?php
use bankaccount\framework\http\Response;
use bankaccount\framework\factory\ViewFactory;

/**
 * @small
 */
class ViewFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\factory\ViewFactory::getView
     */
    public function testDefaultViewCanBeConstructed()
    {
        $viewFactory = new ViewFactory;

        $this->assertInstanceOf(
          'StdClass',
          $viewFactory->getView('StdClass', new Response)
        );
    }
}
