<?php

declare(strict_types=1);

namespace Clouding\Range\Contracts;

interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return string
     */
    public function toString(): string;
}
