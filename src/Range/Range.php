<?php

declare(strict_types=1);

namespace Clouding\Range;

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
            throw new \InvalidArgumentException("$end must greater than $start");
        }

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Dynamic get attribute.
     *
     * @param  $attribute
     * @return mixed
     */
    public function __get($attribute)
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
     * Determine if the range is not contains the integer
     *
     * @param  int  $integer
     * @return bool
     */
    public function isNotContains(int $integer): bool
    {
        return ! $this->contains($integer);
    }

    /**
     * Determine if the range is equals given range or not.
     *
     * @param  \Clouding\Range\Range $range
     * @return bool
     */
    public function equals(Range $range): bool
    {
        return $this->start === $range->start && $this->end === $range->end;
    }

    /**
     * Determine if the range is not equals given range.
     *
     * @param  \Clouding\Range\Range $range
     * @return bool
     */
    public function isNotEquals(Range $range): bool
    {
        return ! $this->equals($range);
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
}
