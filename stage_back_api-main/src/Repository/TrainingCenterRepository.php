<?php

namespace App\Repository;

use App\Entity\TrainingCenter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TrainingCenter>
 *
 * @method TrainingCenter|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrainingCenter|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrainingCenter[]    findAll()
 * @method TrainingCenter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainingCenterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrainingCenter::class);
    }

//    /**
//     * @return TrainingCenter[] Returns an array of TrainingCenter objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TrainingCenter
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
