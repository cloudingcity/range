<?php

declare(strict_types=1);

namespace Clouding\Range\Traits;

trait Functions
{
    /**
     * Execute a callback over each integer of range.
     *
     * @param callable $callback
     * @param int      $gap
     */
    public function each(callable $callback, int $gap = 1)
    {
        foreach ($this->toArray($gap) as $int) {
            if ($callback($int) === false) {
                break;
            }
        }
    }

    /**
     * Get a random integer of the range.
     *
     * @param  int $seed
     * @return int
     */
    public function random(int $seed = null): int
    {
        if (!is_null($seed)) {
            srand($seed);
        }

        return rand($this->start, $this->end);
    }

    /**
     * Get random integers of the range.
     *
     * @param  int   $amount
     * @return array
     */
    public function randomAsArray(int $amount = 1)
    {
        $amount = abs($amount);
        $results = [];

        for ($count = 1; $count <= $amount; $count++) {
            $results[] = $this->random();
        }

        return $results;
    }
}
