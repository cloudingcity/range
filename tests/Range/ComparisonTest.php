<?php

declare(strict_types=1);

namespace Tests\Range;

use Clouding\Range\Range;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class ComparisonTest extends TestCase
{
    use MockeryPHPUnitIntegration;

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
}
