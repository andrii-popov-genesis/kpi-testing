<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserWeight;
use App\ValueObject\DateSegment;

interface UserWeightRepositoryInterface
{
    /**
     * @return UserWeight[]
     */
    public function findWeightsByDateSegment(DateSegment $dateSegment, User $user): array;
}
