<?php

declare(strict_types=1);

namespace Clouding\Range;

class Range
{
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
     */
    public function __construct(int $start, int $end)
    {
        $this->guardAgainstInvalidRange($start, $end);

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Guard against invalid range.
     *
     * @param int $start
     * @param int $end
     */
    protected function guardAgainstInvalidRange(int $start, int $end)
    {
        if ($start >= $end) {
            throw new \InvalidArgumentException("$end must greater than $start");
        }
    }

    /**
     * Get start of range.
     *
     * @return int
     */
    public function start(): int
    {
        return $this->start;
    }

    /**
     * Get end of range.
     *
     * @return int
     */
    public function end(): int
    {
        return $this->end;
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
    public function isNotContains(int $integer)
    {
        return ! $this->contains($integer);
    }
}
