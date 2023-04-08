<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Carbon\Carbon;

/**
 * @property Carbon $dateOnForecourt
 * @property string $externalStockId
 * @property string $externalStockReference
 * @property Carbon $lastUpdated
 * @property Carbon $lastUpdatedByAdvertiser
 * @property string $lifecycleState
 * @property string $searchId
 * @property string $stockId
 * @property int    $versionNumber
 */
class MetaData extends Model
{
    protected $casts = [
        'dateOnForecourt'         => 'date',
        'lastUpdated'             => 'datetime',
        'lastUpdatedByAdvertiser' => 'datetime',
        'versionNumber'           => 'int',
    ];
}
