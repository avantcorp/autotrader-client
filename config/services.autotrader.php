<?php

declare(strict_types=1);

return [
    'key'           => env('AUTOTRADER_KEY'),
    'secret'        => env('AUTOTRADER_SECRET'),
    'advertiser_id' => env('AUTOTRADER_ADVERTISER_ID'),
    'sandbox'       => env('AUTOTRADER_SANDBOX', false),
];
