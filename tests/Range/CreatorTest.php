<?php

declare(strict_types=1);

namespace Tests\Range;

use Clouding\Range\Range;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CreatorTest extends TestCase
{
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
}
