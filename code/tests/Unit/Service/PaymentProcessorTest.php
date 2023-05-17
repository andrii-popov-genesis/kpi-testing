<?php

declare(strict_types=1);

namespace Unit\Service;

use App\Entity\User;
use App\Service\PaymentProcessor;
use App\Service\TestVendorGatewayAdapter;
use App\ValueObject\Payment;
use PHPUnit\Framework\TestCase;

class PaymentProcessorTest extends TestCase
{
    public function testExpectsFail(): void
    {
        $user = new User('john');
        $vendorGatewayMock = new TestVendorGatewayAdapter(false);
        $processor = new PaymentProcessor($vendorGatewayMock);

        $actual = $processor->processPayment($user, '213', 5000);

        self::assertEquals(new Payment($user, 'Fail'), $actual);

    }

    public function testExpectsSuccess(): void
    {
        // arrange
        $user = new User('john');
        $vendorGatewayMock = new TestVendorGatewayAdapter(true);
        $processor = new PaymentProcessor($vendorGatewayMock);

        // act
        $actual = $processor->processPayment($user, '213', 5000);

        // assert
        self::assertEquals(new Payment($user, 'Success'), $actual);
    }
}
