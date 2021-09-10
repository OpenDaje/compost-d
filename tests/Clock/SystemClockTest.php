<?php declare(strict_types=1);

namespace ComposerD\Tests\Clock;

use CompostD\Clock\SystemClock;
use PHPUnit\Framework\TestCase;

/**
 * @covers \CompostD\Clock\SystemClock
 */
class SystemClockTest extends TestCase
{
    /**
     * @test
     */
    public function it_generates_very_precise_date_time_immutables(): void
    {
        $clock = new SystemClock();
        $d1 = $clock->time();
        $d2 = $clock->time();
        self::assertTrue($d1 < $d2);
    }
}
