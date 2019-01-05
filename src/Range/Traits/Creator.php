<?php

declare(strict_types=1);

namespace Clouding\Range\Traits;

use InvalidArgumentException;

trait Creator
{
    /**
     * Create a new range instance.
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
     * Create a instance from string.
     *
     * @param  string $string
     * @return static
     */
    public static function parse(string $string)
    {
        if (!preg_match('/^[-]?\d+\.\.[-]?\d+$/', $string)) {
            throw new invalidArgumentException("Couldn't parse the string \"$string\"");
        }

        [$start, $end] = explode('..', $string);

        return new static((int) $start, (int) $end);
    }
}
