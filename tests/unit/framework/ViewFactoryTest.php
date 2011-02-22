<?php
/**
 * @small
 */
class ViewFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ViewFactory::getView
     */
    public function testDefaultMapperCanBeConstructed()
    {
        $viewFactory = new ViewFactory;

        $this->assertInstanceOf(
          'StdClass',
          $viewFactory->getView('StdClass', new Request, new Response)
        );
    }
}
