<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property bool          $exported
 * @property bool          $imported
 * @property keeperChanges $keeperChanges
 * @property int           $previousOwners
 * @property bool          $scrapped
 * @property bool          $stolen
 * @property V5CS          $v5cs
 */
class History extends Model
{
    protected $casts = [
        'exported'       => 'bool',
        'imported'       => 'bool',
        'keeperChanges'  => keeperChanges::class,
        'previousOwners' => 'int',
        'scrapped'       => 'bool',
        'stolen'         => 'bool',
        'v5cs'           => V5CS::class,
    ];
}
