<?php

declare(strict_types=1);

namespace Unit\Entity;

use App\Entity\User;
use App\Entity\UserWeight;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testExpectsLogWeight(): void
    {
        $user = new User('john doe');

        $actual = $user->logWeight(80000, new \DateTimeImmutable('2023-05-11 18:10'));
        $expected = new UserWeight($user, 80000, new \DateTimeImmutable('2023-05-11 18:10'));

        self::assertEquals($expected, $actual);
        self::assertSame($user, $actual->getUser());
    }
}
