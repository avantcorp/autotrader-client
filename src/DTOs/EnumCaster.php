<?php

namespace Taz\AutoTraderStockClient\DTOs;

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

    public function cast($value, FieldValidator $validator):EnumCaster
    {
        $value = lcfirst(Str::of(ucwords($value))->replace(' ', ''));

        return $this->enumClass::from($value);
    }
}
