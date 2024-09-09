<?php

namespace App\Repository;

use App\Entity\EducationnalBackground;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EducationnalBackground>
 *
 * @method EducationnalBackground|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationnalBackground|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationnalBackground[]    findAll()
 * @method EducationnalBackground[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationnalBackgroundRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EducationnalBackground::class);
    }

//    /**
//     * @return EducationnalBackground[] Returns an array of EducationnalBackground objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EducationnalBackground
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
