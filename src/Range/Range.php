<?php

declare(strict_types=1);

namespace Clouding\Range;

use InvalidArgumentException;

/**
 * @property-read int $start
 * @property-read int $end
 */
class Range
{
    /**
     * Start of format.
     *
     * @var string
     */
    const FORMAT_START = ':start';

    /**
     * End of format.
     *
     * @var string
     */
    const FORMAT_END = ':end';

    /**
     * Start of range.
     *
     * @var int
     */
    protected $start;

    /**
     * End of range.
     *
     * @var int
     */
    protected $end;

    /**
     * Create a range instance.
     *
     * @param int $start
     * @param int $end
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(int $start, int $end)
    {
        if ($start >= $end) {
            throw new InvalidArgumentException("End($end) must greater than Start($start)");
        }

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Create a instance from parse a range string.
     *
     * @param  string                $string
     * @return \Clouding\Range\Range
     */
    public static function parse(string $string): Range
    {
        if (!preg_match('/^[-]?\d+\.\.[-]?\d+$/', $string, $matches)) {
            throw new invalidArgumentException("Couldn't parse the string \"$string\"");
        }

        [$start, $end] = explode('..', $string);

        return new static((int) $start, (int) $end);
    }

    /**
     * Dynamic get attribute.
     *
     * @param  string $attribute
     * @return mixed
     */
    public function __get(string $attribute)
    {
        return $this->$attribute;
    }

    /**
     * Determine if the range is contains the integer or not
     *
     * @param  int  $integer
     * @return bool
     */
    public function contains(int $integer): bool
    {
        return $integer >= $this->start && $integer <= $this->end;
    }

    /**
     * Determine if the range is equals with the given range or not.
     *
     * @param  \Clouding\Range\Range $range
     * @return bool
     */
    public function equals(Range $range): bool
    {
        return $this->start === $range->start && $this->end === $range->end;
    }

    /**
     * Determine if the range is intersect with the given range or not.
     *
     * @param  \Clouding\Range\Range $range
     * @return bool
     */
    public function intersect(Range $range): bool
    {
        return $this->contains($range->start) || $this->contains($range->end);
    }

    /**
     * Formatting string.
     *
     * @param string $format
     * @return string
     */
    public function format(string $format): string
    {
        return strtr($format, [static::FORMAT_START => $this->start, static::FORMAT_END => $this->end]);
    }

    /**
     * Execute a callback over each integer of range.
     *
     * @param callable $callback
     * @param int      $gap
     */
    public function each(callable $callback, $gap = 1)
    {
        foreach (range($this->start, $this->end, $gap) as $int) {
            if ($callback($int) === false) {
                break;
            }
        }
    }

    /**
     * Return range string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Return range string.
     *
     * @return string
     */
    public function toString(): string
    {
        return "$this->start..$this->end";
    }
}
