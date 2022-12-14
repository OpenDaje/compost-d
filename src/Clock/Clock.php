<?php declare(strict_types=1);

/**
 * This file is part of opendaje/compost-d.
 * (c) 2021-2022 Zerai Teclai <teclaizerai@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CompostD\Clock;

use DateTimeImmutable;

interface Clock
{
    public function time(): DateTimeImmutable;
}
