<?php declare(strict_types=1);

namespace CompostD\Clock;

use DateTimeImmutable;
use DateTimeZone;
use InvalidArgumentException;

/**
 * This file is part of opendaje/compost-d.
 * (c) 2021-2022 Zerai Teclai <teclaizerai@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestClock implements Clock
{
    private const FORMAT_OF_TIME = 'Y-m-d H:i:s.uO';

    private DateTimeImmutable $time;

    private DateTimeZone $timeZone;

    public function __construct(DateTimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone ?? new DateTimeZone('UTC');
        $this->tick();
    }

    public function tick(): void
    {
        $this->time = new DateTimeImmutable('now', $this->timeZone);
    }

    public function withFixedTime(string $input): void
    {
        $preciseTime = sprintf('%s.000000', $input);
        $dateTime = DateTimeImmutable::createFromFormat('Y-m-d H:i:s.u', $preciseTime, $this->timeZone);

        if (! $dateTime instanceof DateTimeImmutable) {
            throw new InvalidArgumentException("Invalid input for date/time fixation provided: {$input}");
        }

        $this->time = $dateTime;
    }

    public function time(): DateTimeImmutable
    {
        return $this->time;
    }
}
