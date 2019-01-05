<?php

declare(strict_types=1);

namespace Tests\Range;

use Clouding\Range\Range;
use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
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

    public function testRandom()
    {
        $range = new Range(1, 20);

        $random = $range->random();
        $this->assertTrue($range->contains($random));

        $randoms = $range->random(5);
        foreach ($randoms as $random) {
            $this->assertTrue($range->contains($random));
        }
    }
}