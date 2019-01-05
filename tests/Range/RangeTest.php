<?php

declare(strict_types=1);

namespace Tests\Range;

use Clouding\Range\Range;
use InvalidArgumentException;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function testInvalidInputException()
    {
        $exception = 0;

        try {
            new Range(4, 1);
        } catch (InvalidArgumentException $e) {
            $exception++;
        }

        try {
            new Range(1, 1);
        } catch (InvalidArgumentException $e) {
            $exception++;
        }

        try {
            new Range(-5, -10);
        } catch (InvalidArgumentException $e) {
            $exception++;
        }

        $this->assertSame(3, $exception);
    }

    public function testGet()
    {
        $range = new Range(1, 10);

        $this->assertSame(1, $range->start);
        $this->assertSame(10, $range->end);
    }

    public function testParse()
    {
        $range = Range::parse('1..10');

        $this->assertInstanceOf(Range::class, $range);
        $this->assertSame(1, $range->start);
        $this->assertSame(10, $range->end);
    }

    public function testParseException()
    {
        $exception = 0;

        try {
            Range::parse('1...10');
        } catch (InvalidArgumentException $e) {
            $exception++;
        }

        try {
            Range::parse('-1aa-10');
        } catch (InvalidArgumentException $e) {
            $exception++;
        }

        try {
            Range::parse('123.123');
        } catch (InvalidArgumentException $e) {
            $exception++;
        }

        $this->assertSame(3, $exception);
    }

    public function testContains()
    {
        $range = new Range(1, 10);

        $this->assertTrue($range->contains(1));
        $this->assertTrue($range->contains(10));
        $this->assertTrue($range->contains(5));
    }

    public function testEquals()
    {
        $range = new Range(1, 10);

        $mockRange = Mockery::mock(Range::class, [1, 10]);

        $this->assertTrue($range->equals($mockRange));
    }

    public function testIntersect()
    {
        $range = new Range(1, 10);

        $intersect1 = Mockery::mock(Range::class, [-5, 5]);
        $this->assertTrue($range->intersect($intersect1));

        $intersect2 = Mockery::mock(Range::class, [1, 5]);
        $this->assertTrue($range->intersect($intersect2));

        $intersect3 = Mockery::mock(Range::class, [5, 15]);
        $this->assertTrue($range->intersect($intersect3));

        $notIntersect1 = Mockery::mock(Range::class, [-5, -1]);
        $this->assertFalse($range->intersect($notIntersect1));

        $notIntersect2 = Mockery::mock(Range::class, [11, 15]);
        $this->assertFalse($range->intersect($notIntersect2));
    }

    public function testFormat()
    {
        $range = new Range(1, 10);

        $this->assertSame('1 ~ 10', $range->format(':start ~ :end'));
        $this->assertSame('From 1 to 10', $range->format('From :start to :end'));
    }

    public function testEach()
    {
        $range = new Range(1, 5);

        $results = [];
        $range->each(function ($int) use (&$results) {
            $results[] = $int;
        });
        $this->assertSame([1, 2, 3, 4, 5], $results);

        $results = [];
        $range->each(function ($int) use (&$results) {
            if ($int >= 3) {
                return false;
            }
            $results[] = $int;
        });
        $this->assertSame([1, 2], $results);

        $results = [];
        $range->each(function ($int) use (&$results) {
            $results[] = $int;
        }, 2);
        $this->assertSame([1, 3, 5], $results);
    }
}
