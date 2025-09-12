<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property Link $competitors
 */
class Links extends Model
{
    protected $casts = [
        'competitors' => Link::class,
    ];
}
