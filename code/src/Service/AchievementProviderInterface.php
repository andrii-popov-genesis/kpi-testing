<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\UserWeight;
use Exception;

interface AchievementProviderInterface
{
    /**
     * @param UserWeight[] $userWeightLogs
     *
     * @throws Exception
     */
    public function getAchievements(array $userWeightLogs): array;
}
