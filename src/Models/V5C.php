<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Carbon\Carbon;

/**
 * @property Carbon $issuedDate
 */
class V5C extends Model
{
    protected $casts = [
        'issuedDate' => 'datetime:Y-m-d',
    ];
}
