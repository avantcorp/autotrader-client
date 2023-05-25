<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Carbon\Carbon;

/**
 * @property Carbon $dateOfLastKeeper
 */
class KeeperChange extends Model
{
    protected $casts = [
        'dateOfLastKeeper' => 'datetime:Y-m-d',
    ];
}
