<?php declare(strict_types=1);

namespace CompostD\Clock;

use DateTimeImmutable;
use DateTimeZone;

class SystemClock implements Clock
{
    private DateTimeZone $timeZone;

    public function __construct(DateTimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone ?? new DateTimeZone('UTC');
    }
    
    public function time(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}
