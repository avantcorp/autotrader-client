<?php

namespace Taz\AutoTraderStockClient\Models;

use Taz\AutoTraderStockClient\Enums\PublishStatus as PublishStatusEnum;

/**
 * @property PublishStatusEnum $status
 */
class PublishStatus extends Model
{
    protected $casts = [
        'status' => PublishStatusEnum::class,
    ];
}