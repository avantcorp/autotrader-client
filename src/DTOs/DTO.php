<?php

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

abstract class DTO extends DataTransferObject
{
    /** @return static */
    public static function fromApi(array $data): DTO
    {
        return new static($data);
    }
}