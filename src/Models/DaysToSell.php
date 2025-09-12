<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property float $value
 */
class DaysToSell extends Model
{
    protected $casts = [
        'value' => 'float',
    ];
}
