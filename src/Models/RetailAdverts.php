<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property Price      $suppliedPrice
 * @property-read Price $totalPrice
 * @property Price      $adminFee
 * @property Price      $manufacturerRRP
 * @property string     $attentionGrabber
 * @property string     $description
 * @property string     $description2
 */
class RetailAdverts extends Model
{
    protected $casts = [
        'suppliedPrice'   => Price::class,
        'totalPrice'      => Price::class,
        'adminFee'        => Price::class,
        'manufacturerRRP' => Price::class,
    ];
}
