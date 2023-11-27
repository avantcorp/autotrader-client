<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property string $dateOfLastKeeper
 */
class keeperChanges extends Model
{
    protected $casts = [
        'dateOfLastKeeper' => 'date',
    ];
}
