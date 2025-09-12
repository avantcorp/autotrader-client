<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Illuminate\Support\Collection;
use Avant\AutoTraderClient\Casts\CollectionCast;

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
