<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

/**
 * @property string $issuedDate
 */
class V5CS extends Model
{
    protected $casts = [
        'issuedDate' => 'date',
    ];
}
