<?php

namespace Avant\AutotraderStockClient\Enums;

use Avant\AutotraderStockClient\DTOs\EnumCaster;

/**
 * @method static self standard()
 * @method static self optional()
 */

class Type extends EnumCaster
{
    public static function labels()
    {
        return [
            'standard' => 'Standard',
            'optional' => 'Optional',
        ];
    }
}
