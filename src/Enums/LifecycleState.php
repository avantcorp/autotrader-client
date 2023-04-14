<?php

namespace Taz\AutoTraderStockClient\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self DUE_IN()
 * @method static self FORECOURT()
 * @method static self SALE_IN_PROGRESS()
 * @method static self WASTEBIN()
 * @method static self DELETED()
 */
class LifecycleState extends Enum
{
}
