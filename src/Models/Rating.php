<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property float $value
 */
class Rating extends Model
{
    protected $casts = [
        'value' => 'float',
    ];
}
