<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Enums;

enum PublishStatus: string
{
    case Published = 'PUBLISHED';
    case NotPublished = 'NOT_PUBLISHED';
    case Rejected = 'REJECTED';
    case Capped = 'CAPPED';
}
