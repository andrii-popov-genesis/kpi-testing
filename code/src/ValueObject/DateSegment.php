<?php

declare(strict_types=1);

namespace App\ValueObject;

class DateSegment
{
    public function __construct(private \DateTimeImmutable $start, private \DateTimeImmutable $end)
    {
    }

    public function getStart(): \DateTimeImmutable
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeImmutable
    {
        return $this->end;
    }

    public function has(\DateTimeImmutable $date): bool
    {
        return $this->start <= $date && $date <= $this->end;
    }
}
