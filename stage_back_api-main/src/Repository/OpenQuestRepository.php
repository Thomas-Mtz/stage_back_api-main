<?php

namespace App\Repository;

use App\Entity\OpenQuest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpenQuest>
 *
 * @method OpenQuest|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpenQuest|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpenQuest[]    findAll()
 * @method OpenQuest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpenQuestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpenQuest::class);
    }

//    /**
//     * @return OpenQuest[] Returns an array of OpenQuest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OpenQuest
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
