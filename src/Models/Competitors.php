<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Avant\AutoTraderClient\Casts\CollectionCast;
use Illuminate\Support\Collection;

/**
 * @property int               $totalResults
 * @property Collection<Stock> $results
 */
class Competitors extends Model
{
    public $casts = [
        'totalResults' => 'int',
        'results'      => CollectionCast::class.':'.Stock::class,
    ];
}
