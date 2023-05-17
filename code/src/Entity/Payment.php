<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    private ?int $id = null;

    public function __construct(
        #[ORM\Column]
        private \DateTimeImmutable $createdOn,
        #[ORM\ManyToOne(targetEntity: User::class)]
        private User $user,
        #[ORM\Column]
        private int $amount,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedOn(): \DateTimeImmutable
    {
        return $this->createdOn;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
