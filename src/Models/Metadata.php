<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Carbon\Carbon;
use Taz\AutoTraderStockClient\Enums;

/**
 * @property Carbon $dateOnForecourt
 * @property string $externalStockId
 * @property string $externalStockReference
 * @property Carbon $lastUpdated
 * @property Carbon $lastUpdatedByAdvertiser
 * @property LifeCycleState $lifecycleState
 * @property string $searchId
 * @property string $stockId
 * @property int    $versionNumber
 */
class Metadata extends Model
{
    protected $casts = [
        'dateOnForecourt'         => 'datetime:Y-m-d',
        'lastUpdated'             => 'datetime:Y-m-d H:i:s',
        'lastUpdatedByAdvertiser' => 'datetime:Y-m-d H:i:s',
        'versionNumber'           => 'int',
        'lifecycleState'          => Enums\LifeCycleState::class,
    ];
}
