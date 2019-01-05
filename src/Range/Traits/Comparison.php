<?php

declare(strict_types=1);

namespace Clouding\Range\Traits;

use Clouding\Range\Range;

trait Comparison
{
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
}
