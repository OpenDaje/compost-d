<?php declare(strict_types=1);

namespace ComposerD\Tests\Clock;

use CompostD\Clock\TestClock;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \CompostD\Clock\TestClock
 */
class TestClockTest extends TestCase
{
    /**
     * @test
     */
    public function getting_back_equal_date_times(): void
    {
        $clock = new TestClock();

        $d1 = $clock->time();
        $d2 = $clock->time();

        self::assertEquals($d1, $d2);
    }

    /**
     * @test
     */
    public function ticking_the_clock_sets_it_forward(): void
    {
        $clock = new TestClock();

        $d1 = $clock->time();
        $clock->tick();
        $d2 = $clock->time();

        self::assertNotEquals($d1, $d2);
        self::assertTrue($d1 < $d2);
    }

    /**
     * @test
     */
    public function fixating_the_clock(): void
    {
        $clock = new TestClock();

        $clock->withFixedTime('2017-01-01 12:00:00');
        $d1 = $clock->time();
        $clock->withFixedTime('2016-01-01 12:00:00');
        $d2 = $clock->time();

        self::assertTrue($d1 > $d2);
    }

    /**
     * @test
     */
    public function failing_to_fixate_the_clock(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $clock = new TestClock();

        $clock->withFixedTime('sihvwshv oihacih ohaciohc');
    }
}
