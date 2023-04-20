<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self IncVat()
 * @method static self ExVat()
 * @method static self NoVat()
 */
class VatStatus extends Enum
{
    public static function values(): array
    {
        return [
            'IncVat' => 'Inc VAT',
            'ExVat'  => 'Ex VAT',
            'NoVat'  => 'No VAT',
        ];
    }
}