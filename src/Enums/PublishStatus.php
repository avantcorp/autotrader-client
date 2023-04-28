<?php

namespace Taz\AutoTraderStockClient\Enums;

enum PublishStatus: string
{
    case Published = 'PUBLISHED';
    case NotPublished = 'NOT_PUBLISHED';
    case Rejected = 'REJECTED';
}
