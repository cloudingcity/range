<?php

declare(strict_types=1);

namespace Tests\Range;

use Clouding\Range\Range;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function testToString()
    {
        $string = '-5..5';

        $range = Range::parse($string);

        $this->assertSame($string, strval($range));
        $this->assertSame($string, $range->toString());
    }

    public function testToArray()
    {
        $range = new Range(1, 5);

        $this->assertSame([1, 2, 3, 4, 5], $range->toArray());
        $this->assertSame([1, 3, 5], $range->toArray(2));
    }

    public function testFormat()
    {
        $range = new Range(1, 10);

        $this->assertSame('1 ~ 10', $range->format(':start ~ :end'));
        $this->assertSame('From 1 to 10', $range->format('From :start to :end'));
    }
}
