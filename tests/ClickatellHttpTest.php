<?php

namespace NotificationChannels\Clickatell\Test;

use NotificationChannels\Clickatell\ClickatellHttp;
use PHPUnit\Framework\TestCase;

class ClickatellHttpTest extends TestCase
{
    private $_httpClient;

    public function setUp(): void
    {
        parent::setUp();

        $this->_httpClient = new ClickatellHttp("test_api");
    }

    public function tearDown(): void
    {
        $this->_httpClient = null;

        parent::tearDown();
    }

    /** @test */
    public function it_sets_instanst_of_clickatell_http()
    {
        $this->assertInstanceOf(ClickatellHttp::class, $this->_httpClient);
    }


    private function _reflection()
    {
        
    }
}

