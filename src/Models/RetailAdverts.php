<?php

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property Price      $suppliedPrice
 * @property-read Price $totalPrice
 * @property Price      $adminFee
 * @property Price      $manufacturerRRP
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
