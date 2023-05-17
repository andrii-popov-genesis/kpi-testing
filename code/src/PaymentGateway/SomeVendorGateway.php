<?php

declare(strict_types=1);

namespace App\PaymentGateway;

final class SomeVendorGateway
{
    public function processPayment(string $orderId, int $amount): bool
    {
        return (bool) rand(0, 1);
    }
}
