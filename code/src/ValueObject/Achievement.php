<?php

declare(strict_types=1);

namespace App\ValueObject;

use DateTimeImmutable;

class Achievement
{
    public function __construct(private string $name, private DateTimeImmutable $createdAt)
    {
    }

    public static function createGreatJobLostWeight(int $weightGrammes, DateTimeImmutable $createdAt): self
    {
        return new self(sprintf('Great job, you lost %d kg!', $weightGrammes / 1000), $createdAt);
    }

    public static function createAwesomeJobLostWeight(int $weightGrammes, DateTimeImmutable $createdAt): self
    {
        return new self(sprintf('Awesome job, you lost %d kg!', $weightGrammes / 1000), $createdAt);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
