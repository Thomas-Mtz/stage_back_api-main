<?php

namespace App\Repository;

use App\Entity\ProBackground;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProBackground>
 *
 * @method ProBackground|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProBackground|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProBackground[]    findAll()
 * @method ProBackground[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProBackgroundRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProBackground::class);
    }

//    /**
//     * @return ProBackground[] Returns an array of ProBackground objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProBackground
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
