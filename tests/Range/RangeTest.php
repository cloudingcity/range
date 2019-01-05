<?php

declare(strict_types=1);

namespace Tests\Range;

use Clouding\Range\Range;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    public function testGet()
    {
        $range = new Range(1, 10);

        $this->assertSame(1, $range->start);
        $this->assertSame(10, $range->end);
    }
}
