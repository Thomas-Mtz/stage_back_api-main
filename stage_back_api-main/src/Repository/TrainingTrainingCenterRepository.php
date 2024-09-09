<?php

namespace App\Repository;

use App\Entity\TrainingTrainingCenter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TrainingTrainingCenter>
 *
 * @method TrainingTrainingCenter|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrainingTrainingCenter|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrainingTrainingCenter[]    findAll()
 * @method TrainingTrainingCenter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainingTrainingCenterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrainingTrainingCenter::class);
    }

//    /**
//     * @return TrainingTrainingCenter[] Returns an array of TrainingTrainingCenter objects
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

//    public function findOneBySomeField($value): ?TrainingTrainingCenter
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
