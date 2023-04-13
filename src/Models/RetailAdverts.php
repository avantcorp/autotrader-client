<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\Models;

/**
 * @property Price         $suppliedPrice
 * @property-read Price    $totalPrice
 * @property Price         $adminFee
 * @property Price         $manufacturerRRP
 * @property string        $attentionGrabber
 * @property string        $description
 * @property string        $description2
 * @property PublishStatus $autotraderAdvert
 * @property PublishStatus $advertiserAdvert
 * @property PublishStatus $locatorAdvert
 * @property PublishStatus $exportAdvert
 * @property PublishStatus $profileAdvert
 */
class RetailAdverts extends Model
{
    protected $casts = [
        'suppliedPrice'    => Price::class,
        'totalPrice'       => Price::class,
        'adminFee'         => Price::class,
        'manufacturerRRP'  => Price::class,
        'autotraderAdvert' => PublishStatus::class,
        'advertiserAdvert' => PublishStatus::class,
        'locatorAdvert'    => PublishStatus::class,
        'exportAdvert'     => PublishStatus::class,
        'profileAdvert'    => PublishStatus::class,
    ];
}
