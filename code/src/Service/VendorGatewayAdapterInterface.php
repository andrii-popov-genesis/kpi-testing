<?php

declare(strict_types=1);

namespace App\Service;

interface VendorGatewayAdapterInterface
{
    public function processPayment(string $orderId, int $amount): bool;
}
