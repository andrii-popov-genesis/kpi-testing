<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class WeightLogger implements WeightLoggerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function logWeight(User $user, int $weight): void
    {
        $weight = $user->logWeight($weight, new \DateTimeImmutable());

        $this->entityManager->persist($weight);
        $this->entityManager->flush();
    }
}
