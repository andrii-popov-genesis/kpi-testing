<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\PaymentGateway\SomeVendorGateway;
use App\ValueObject\Payment;

class PaymentProcessor implements PaymentProcessorInterface
{
    public function __construct(private VendorGatewayAdapterInterface $vendorGateway)
    {
    }

    public function processPayment(User $user, string $orderId, int $amount): Payment
    {
        $result = $this->vendorGateway->processPayment($orderId, $amount);
        $result = $result ? 'Success' : 'Fail';

        return new Payment($user, $result);
    }
}
