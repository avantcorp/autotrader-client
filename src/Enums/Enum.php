<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Enums;

use Spatie\Enum\Enumerable;

class Enum extends \Spatie\Enum\Enum
{
    public static function make($value): Enumerable
    {
        return parent::make(lcfirst(preg_replace('/\s/', '', ucwords($value))));
    }
}
