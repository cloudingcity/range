<?php

declare(strict_types=1);

namespace Clouding\Range;

use Clouding\Range\Contracts\Arrayable;
use Clouding\Range\Contracts\Stringable;
use Clouding\Range\Traits\Comparison;
use Clouding\Range\Traits\Converter;
use Clouding\Range\Traits\Creator;
use Clouding\Range\Traits\Functions;

/**
 * @property-read int $start
 * @property-read int $end
 */
class Range implements Stringable, Arrayable
{
    use Creator;
    use Comparison;
    use Converter;
    use Functions;

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
     * Dynamic get attribute.
     *
     * @param  string $attribute
     * @return mixed
     */
    public function __get(string $attribute)
    {
        return $this->$attribute;
    }
}
