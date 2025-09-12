<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property Price $partExchange
 * @property Price $private
 * @property Price $retail
 * @property Price $trade
 */
class Valuations extends Model
{
    protected $casts = [
        'partExchange' => Price::class,
        'private'      => Price::class,
        'retail'       => Price::class,
        'trade'        => Price::class,
    ];
}
