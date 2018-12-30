<?php

declare(strict_types=1);

namespace Clouding\Range\Tests;

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

    public function testContains()
    {
        $range = new Range(1, 10);

        $this->assertTrue($range->contains(1));
        $this->assertTrue($range->contains(10));
        $this->assertTrue($range->contains(5));

        $this->assertTrue($range->isNotContains(0));
        $this->assertTrue($range->isNotContains(11));
        $this->assertTrue($range->isNotContains(-8));
    }

    public function testEquals()
    {
        $range = new Range(1, 10);

        $mockRange = Mockery::mock(Range::class, [1, 10]);

        $this->assertTrue($range->equals($mockRange));
        $this->assertFalse($range->isNotEquals($mockRange));
    }
}
