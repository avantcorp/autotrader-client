<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Illuminate\Support\Collection;
use Avant\AutoTraderClient\Casts\CollectionCast;

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
