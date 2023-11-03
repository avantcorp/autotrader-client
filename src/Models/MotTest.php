<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property string        $completedDate
 * @property string        $expiryDate
 * @property int           $odometerValue
 * @property string        $odometerUnit
 * @property string        $motTestNumber
 * @property RfrAndComment $rfrAndComments
 * @property string        $testResult
 */
class MotTest extends Model
{
    protected $casts = [
        'odometerValue'  => 'int',
        'rfrAndComments' => RfrAndComment::class,
    ];
}
