<?php

declare(strict_types=1);

namespace Unit\ValueObject;

use App\ValueObject\DateSegment;
use PHPUnit\Framework\TestCase;

class DateSegmentTest extends TestCase
{
    /**
     * @dataProvider dataProviderHasDate
     */
    public function testExpectsHasDate(string $date, bool $expected): void
    {
        $dateSegment = new DateSegment(
            new \DateTimeImmutable('2023-01-10'),
            new \DateTimeImmutable('2023-01-20'),
        );

        self::assertSame($expected, $dateSegment->has(new \DateTimeImmutable($date)));
    }

    public function dataProviderHasDate(): iterable
    {
        yield ['2023-01-10', true];
        yield ['2023-01-15', true];
        yield ['2023-01-20', true];

        yield ['2023-01-05', false];
        yield ['2023-01-25', false];
    }
}
