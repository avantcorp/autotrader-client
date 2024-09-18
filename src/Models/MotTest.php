<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Casts\CollectionCast;

/**
 * @property string                                    $completedDate
 * @property string                                    $expiryDate
 * @property int                                       $odometerValue
 * @property string                                    $odometerUnit
 * @property string                                    $motTestNumber
 * @property Collection<RfrAndComment>|RfrAndComment[] $rfrAndComments
 * @property string                                    $testResult
 */
class MotTest extends Model
{
    protected $casts = [
        'completedDate'  => 'datetime',
        'expiryDate'     => 'date',
        'odometerValue'  => 'int',
        'rfrAndComments' => CollectionCast::class.':'.RfrAndComment::class,
    ];
}
