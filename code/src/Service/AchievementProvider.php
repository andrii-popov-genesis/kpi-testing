<?php

declare(strict_types=1);

namespace App\Service;

use App\ValueObject\Achievement;

/**
 * Необхідно відрефакторити цей клас так, щоб ми могли в юніт тесті перевірити час створення Achievement з точністю до секунди.
 * Наразі це неможливо за рахунок виклику sleep, що моделює т.з. нестабільний тест.
 *
 * Дуже часто саме такі тести час від часу не проходять через те, що при спробі порівняти дату,
 * яка генерується в самому методі як поточна з поточною в юніт тесті буде
 * розбіжність на рівні мілісекунд.
 *
 * В нашому випадку я для зручності просто додав паузу в 2 секунди щоб це було очевидно.
 */
class AchievementProvider implements AchievementProviderInterface
{
    /** {@inheritDoc} */
    public function getAchievements(array $userWeightLogs): array
    {
        $firstKey = array_key_first($userWeightLogs);
        $lastKey = array_key_last($userWeightLogs);

        /**
         * Це додано для моделювання нестабільного тесту. Не прибирати
         */
        sleep(2);

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
