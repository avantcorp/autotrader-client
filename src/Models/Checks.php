<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property string $insuranceWriteoffCategory
 * @property bool   $scrapped
 * @property bool   $stolen
 * @property bool   $imported
 * @property bool   $exported
 * @property bool   $privateFinance
 * @property bool   $tradeFinance
 * @property bool   $highRisk
 * @property bool   $mileageDiscrepancy
 * @property bool   $colourChanged
 * @property bool   $registrationChanged
 * @property int    $previousOwners
 */
class Checks extends Model
{
    protected $casts = [
        '$registrationChanged' => 'bool',
        'scrapped'             => 'bool',
        'stolen'               => 'bool',
        'imported'             => 'bool',
        'exported'             => 'bool',
        'privateFinance'       => 'bool',
        'tradeFinance'         => 'bool',
        'highRisk'             => 'bool',
        'mileageDiscrepancy'   => 'bool',
        'colourChanged'        => 'bool',
        'previousOwners'       => 'int',
    ];
}
