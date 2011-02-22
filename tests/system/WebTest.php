<?php
/**
 * @large
 */
class WebTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        $this->setBrowserUrl('http://localhost');
    }

    public function test()
    {
        $this->open('/bankaccounts');
        $this->assertTextPresent('Bank Account #1');
        $this->clickAndWait('link=Bank Account #1');
        $this->assertTextPresent('The balance of bank account #1 is 1.00.');
    }
}
