<?php

namespace Taz\AutoTraderStockClient\Enums;

enum LifecycleState: string
{
    case Deleted = 'DELETED';
    case DueIn = 'DUE_IN';
    case Forecourt = 'FORECOURT';
    case SaleInProgress = 'SALE_IN_PROGRESS';
    case Sold = 'SOLD';
    case Wastebin = 'WASTEBIN';
}
