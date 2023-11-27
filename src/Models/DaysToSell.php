<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property float $value
 */
class DaysToSell extends Model
{
    protected $casts = [
        'value' => 'float',
    ];
}
