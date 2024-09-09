<?php

namespace App\Repository;

use App\Entity\LastStudies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LastStudies>
 *
 * @method LastStudies|null find($id, $lockMode = null, $lockVersion = null)
 * @method LastStudies|null findOneBy(array $criteria, array $orderBy = null)
 * @method LastStudies[]    findAll()
 * @method LastStudies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LastStudiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LastStudies::class);
    }

//    /**
//     * @return LastStudies[] Returns an array of LastStudies objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LastStudies
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
