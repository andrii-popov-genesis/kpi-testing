<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\ValueObject\Payment;

interface PaymentProcessorInterface
{
    public function processPayment(User $user, string $orderId, int $amount): Payment;
}
