<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property Link $competitors
 */
class Links extends Model
{
    protected $casts = [
        'competitors' => Link::class,
    ];
}
