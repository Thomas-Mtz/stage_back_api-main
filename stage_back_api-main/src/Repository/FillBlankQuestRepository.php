<?php

namespace App\Repository;

use App\Entity\FillBlankQuest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FillBlankQuest>
 *
 * @method FillBlankQuest|null find($id, $lockMode = null, $lockVersion = null)
 * @method FillBlankQuest|null findOneBy(array $criteria, array $orderBy = null)
 * @method FillBlankQuest[]    findAll()
 * @method FillBlankQuest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FillBlankQuestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FillBlankQuest::class);
    }

//    /**
//     * @return FillBlankQuest[] Returns an array of FillBlankQuest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FillBlankQuest
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
