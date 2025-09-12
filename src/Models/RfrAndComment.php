<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property bool   $dangerous
 * @property string $type
 * @property string $text
 */
class RfrAndComment extends Model
{
    protected $casts = [
        'dangerous' => 'bool',
    ];
}
