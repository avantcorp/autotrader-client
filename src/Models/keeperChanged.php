<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Carbon;

/**
 * @property Carbon $dateOfLastKeeper
 */
class keeperChanged extends Model
{
    protected $casts = [
        'dateOfLastKeeper' => Carbon::class,
    ];
}
