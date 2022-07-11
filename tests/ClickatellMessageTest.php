<?php

namespace NotificationChannels\Clickatell\Test;

use NotificationChannels\Clickatell\ClickatellMessage;
use PHPUnit\Framework\TestCase;

class ClickatellMessageTest extends TestCase
{
    protected $clickatellMessage;
    private $httpClient;

    public function setUp(): void
    {
        parent::setUp();

        $this->clickatellMessage = new ClickatellMessage();
    }

    /** @test */
    public function it_sets_a_clickatell_message()
    {
        $this->assertInstanceOf(ClickatellMessage::class, $this->clickatellMessage);
    }

    /** @test */
    public function it_can_construct_with_a_new_message_and_phone()
    {
        $actual = ClickatellMessage::create('phone_1', 'This is some content');

        $this->assertEquals(['phone_1'], $actual->getPhone());
        $this->assertEquals('This is some content', $actual->getMessage());
    }

    /** @test */
    public function it_can_construct_with_a_new_message_and_phones()
    {
        $actual = ClickatellMessage::create(['phone_1', 'phone_2'], 'This is some content');

        $this->assertEquals(['phone_1', 'phone_2'], $actual->getPhone());
        $this->assertEquals('This is some content', $actual->getMessage());
    }

    /** @test */
    public function it_can_construct_with_a_phone_number()
    {
        $actual = ClickatellMessage::create('03210123456789');

        $this->assertEmpty($actual->getMessage());
        $this->assertEquals(['03210123456789'], $actual->getPhone());
    }

    /** @test */
    public function it_can_set_new_content()
    {
        $actual = ClickatellMessage::create();

        $this->assertEmpty($actual->getMessage());

        $actual->setMessage('Hello');

        $this->assertEquals('Hello', $actual->getMessage());
    }

    /** @test */
    public function it_can_set_new_phone_number()
    {
        $actual = ClickatellMessage::create();

        $this->assertEmpty($actual->getPhone());

        $actual->setPhone(['03210123456789']);

        $this->assertEquals(['03210123456789'], $actual->getPhone());
    }
}
