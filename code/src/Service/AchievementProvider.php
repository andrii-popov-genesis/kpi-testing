<?php

declare(strict_types=1);

namespace App\Service;

use App\ValueObject\Achievement;

class AchievementProvider implements AchievementProviderInterface
{
    /** {@inheritDoc} */
    public function getAchievements(array $userWeightLogs): array
    {
        $firstKey = array_key_first($userWeightLogs);
        $lastKey = array_key_last($userWeightLogs);

        $weightDiff = $userWeightLogs[$lastKey]->getWeightGrammes() - $userWeightLogs[$firstKey]->getWeightGrammes();

        if ($weightDiff > 4000) {
            return [Achievement::createAwesomeJobLostWeight($weightDiff, new \DateTimeImmutable())];
        }

        if ($weightDiff > 2000) {
            return [Achievement::createGreatJobLostWeight($weightDiff, new \DateTimeImmutable())];
        }

        return [];
    }
}
