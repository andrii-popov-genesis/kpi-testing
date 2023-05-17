<?php

declare(strict_types=1);

namespace App\Service;

class TestVendorGatewayAdapter implements VendorGatewayAdapterInterface
{
    public function __construct(private bool $expected)
    {
    }

    public function processPayment(string $orderId, int $amount): bool
    {
        return $this->expected;
    }

}
