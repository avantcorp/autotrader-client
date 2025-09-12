<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Models;

use Avant\AutoTraderClient\Enums\PublishStatus as PublishStatusEnum;

/**
 * @property PublishStatusEnum $status
 */
class PublishStatus extends Model
{
    protected $casts = [
        'status' => PublishStatusEnum::class,
    ];
}
