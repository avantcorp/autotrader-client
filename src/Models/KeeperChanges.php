<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property string $dateOfLastKeeper
 */
class KeeperChanges extends Model
{
    protected $casts = [
        'dateOfLastKeeper' => 'date',
    ];
}
