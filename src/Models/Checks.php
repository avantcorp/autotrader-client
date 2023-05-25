<?php

namespace Taz\AutoTraderStockClient\Models;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Casts\CollectionCast;

/**
 * @property string|null              $insuranceWriteoffCategory
 * @property bool                     $scrapped
 * @property bool                     $stolen
 * @property bool                     $imported
 * @property bool                     $exported
 * @property bool                     $privateFinance
 * @property bool                     $tradeFinance
 * @property bool                     $highRisk
 * @property bool                     $mileageDiscrepancy
 * @property bool                     $colourChanged
 * @property bool                     $registrationChanged
 * @property int                      $previousOwners
 * @property Collection<KeeperChange> $keeperChanges
 * @property Collection<V5C>          $v5cs
 */
class Checks extends Model
{
    protected $casts = [
        'registrationChanged' => 'bool',
        'scrapped'            => 'bool',
        'stolen'              => 'bool',
        'imported'            => 'bool',
        'exported'            => 'bool',
        'privateFinance'      => 'bool',
        'tradeFinance'        => 'bool',
        'highRisk'            => 'bool',
        'mileageDiscrepancy'  => 'bool',
        'colourChanged'       => 'bool',
        'previousOwners'      => 'int',
        'keeperChanges'       => CollectionCast::class.':'.KeeperChange::class,
        'v5cs'                => CollectionCast::class.':'.V5C::class,
    ];
}
