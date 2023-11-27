<?php

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Casts\CollectionCast;

/**
 * @property int                       $totalResults
 * @property Collection<Stock>|Stock[] $results
 */
class Competitors extends Model
{
    public $casts = [
        'totalResults' => 'int',
        'results'      => CollectionCast::class.':'.Stock::class,
    ];
}