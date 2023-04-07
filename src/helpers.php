<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient;

if (!function_exists('sanitize_registration')) {
    function sanitize_registration(string $registration): string
    {
        return preg_replace('/[^A-Z0-9]/', '', strtoupper($registration));
    }
}
