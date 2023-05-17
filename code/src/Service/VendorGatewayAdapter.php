<?php

declare(strict_types=1);

namespace App\Service;

use App\PaymentGateway\SomeVendorGateway;

class VendorGatewayAdapter implements VendorGatewayAdapterInterface
{
    public function __construct(private SomeVendorGateway $vendorGateway)
    {
    }

    public function processPayment(string $orderId, int $amount): bool
    {
        return $this->vendorGateway->processPayment($orderId, $amount);
    }
}
