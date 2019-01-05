<?php

declare(strict_types=1);

namespace Clouding\Range\Traits;

trait Converter
{
    /**
     * Get the instance as a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Get the instance as a string.
     *
     * @return string
     */
    public function toString(): string
    {
        return "$this->start..$this->end";
    }

    /**
     * Get the instance as an array.
     *
     * @param  int $gap
     * @return array
     */
    public function toArray(int $gap = 1): array
    {
        return range($this->start, $this->end, $gap);
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
