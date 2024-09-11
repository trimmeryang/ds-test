<?php

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;
use Src\ITimeServiceInterface;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    public function setUp(): void
    {
        $this->mockTime('2024-01-01 06:00:00');
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    public function test_greeting()
    {
        $this->assertTrue(
            strlen($this->greeter->greeting()) > 0
        );
    }

    /**
     * @dataProvider timeDataProvider
     */
    public function test_time_greeting($time, $expected)
    {
        $this->mockTime($time);
        $this->assertEquals($expected, $this->greeter->greeting());
    }

    private function mockTime($date)
    {
        $mockTimeService = $this->createMock(ITimeServiceInterface::class);
        $mockTimeService->method('getCurrentTime')
            ->willReturn(new DateTime($date));
        $this->greeter = new MyGreeter($mockTimeService);
    }


    public static function timeDataProvider()
    {
        return [
            ['2024-01-01 06:00:00', MyGreeter::MORNING_GREETING],
            ['2024-01-01 07:00:00', MyGreeter::MORNING_GREETING],
            ['2024-01-01 12:00:00', MyGreeter::AFTERNOON_GREETING],
            ['2024-01-01 18:00:00', MyGreeter::EVENING_GREETING],
            ['2024-01-01 22:00:00', MyGreeter::EVENING_GREETING],
            ['2024-01-01 03:00:00', MyGreeter::EVENING_GREETING],
        ];
    }
}
