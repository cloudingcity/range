<?php

declare(strict_types=1);

namespace Clouding\Range\Contracts;

interface Stringable
{
    /**
     * Get the instance as a string.
     *
     * @return string
     */
    public function toString(): string;
}
