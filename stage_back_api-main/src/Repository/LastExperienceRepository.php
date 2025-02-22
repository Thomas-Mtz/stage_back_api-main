<?php

namespace App\Repository;

use App\Entity\LastExperience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LastExperience>
 *
 * @method LastExperience|null find($id, $lockMode = null, $lockVersion = null)
 * @method LastExperience|null findOneBy(array $criteria, array $orderBy = null)
 * @method LastExperience[]    findAll()
 * @method LastExperience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LastExperienceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LastExperience::class);
    }

//    /**
//     * @return LastExperience[] Returns an array of LastExperience objects
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

//    public function findOneBySomeField($value): ?LastExperience
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
