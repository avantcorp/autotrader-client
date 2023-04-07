<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Casters;

use Illuminate\Support\Str;
use Spatie\DataTransferObject\FieldValidator;
use Spatie\DataTransferObject\ValueCaster;

class EnumCaster extends ValueCaster
{
    private string $enumClass;

    public function __construct($types)
    {
        $this->enumClass = $types[0];
    }

    public function cast($value, FieldValidator $validator): EnumCaster
    {
        $value = lcfirst(Str::of(ucwords($value))->replace(' ', '')->__toString());

        return $this->enumClass::from($value);
    }
}
