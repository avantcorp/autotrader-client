<?php

namespace Taz\AutoTraderStockClient\Enums;

enum LifecycleState: string
{
    case DueIn = 'DUE_IN';
    case ForeCourt = 'FORECOURT';
    case SaleInProgress = 'SALE_IN_PROGRESS';
    case Wastebin = 'WASTEBIN';
    case Deleted = 'DELETED';
}
