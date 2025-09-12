<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property string $dateOfLastKeeper
 */
class KeeperChanges extends Model
{
    protected $casts = [
        'dateOfLastKeeper' => 'date',
    ];
}
