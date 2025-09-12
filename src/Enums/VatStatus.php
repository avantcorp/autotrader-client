<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Enums;

enum VatStatus: string
{
    case IncVat = 'Inc VAT';
    case ExVat = 'Ex VAT';
    case NoVat = 'No VAT';
}
