<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Enums;

use Taz\AutoTraderStockClient\DTOs\EnumCaster;

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
