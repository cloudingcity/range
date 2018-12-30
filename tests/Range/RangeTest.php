<?php

declare(strict_types=1);

namespace Clouding\Range\Tests;

use Clouding\Range\Range;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    /**
     * @var \Clouding\Range\Range
     */
    protected $range;

    protected function setUp()
    {
        $this->range = new Range(1, 10);
    }

    /**
     * @dataProvider invalidInputProvider
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidInputException(int $start, int $end)
    {
        new Range($start, $end);
    }

    public function invalidInputProvider()
    {
        return [
            [4, 1],
            [1, 1],
            [-5, -10],
        ];
    }

    public function testGetStartAndEnd()
    {
        $range = new Range(1, 10);

        $this->assertSame(1, $range->start());
        $this->assertSame(10, $range->end());
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

    public function testIsNotContains()
    {
         $range = new Range(1, 10);

        $this->assertTrue($range->isNotContains(0));
        $this->assertTrue($range->isNotContains(11));
        $this->assertTrue($range->isNotContains(-8));
    }
}
