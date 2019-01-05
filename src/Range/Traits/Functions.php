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
     * Get random integer of the range.
     *
     * @param  int $amount
     * @return int|array
     */
    public function random(int $amount = null)
    {
        if (is_null($amount)) {
            return rand($this->start, $this->end);
        }

        $results = [];
        for ($count = 1; $count <= abs($amount); $count++) {
            $results[] = $this->random();
        }

        return $results;
    }
}
