<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Carbon;

/**
 * @property Carbon $issuedDate
 */
class V5CS extends Model
{
    protected $casts = [
        'issuedDate' => Carbon::class,
    ];
}
