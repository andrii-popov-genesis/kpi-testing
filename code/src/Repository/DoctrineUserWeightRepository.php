<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserWeight;
use App\ValueObject\DateSegment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineUserWeightRepository extends ServiceEntityRepository implements UserWeightRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserWeight::class);
    }

    /** {@inheritDoc} */
    public function findWeightsByDateSegment(DateSegment $dateSegment, User $user): array
    {
        return $this
            ->createQueryBuilder('user_weight')
            ->andWhere('user_weight.user = :user')
            ->andWhere('user_weight.created_at >= :start')
            ->andWhere('user_weight.created_at <= :end')
            ->setParameter('user', $user)
            ->setParameter('start', $dateSegment->getStart())
            ->setParameter('end', $dateSegment->getEnd())
            ->getQuery()
            ->getResult()
        ;
    }

}
