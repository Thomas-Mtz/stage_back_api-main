<?php

namespace App\Repository;

use App\Entity\MultiChoiceQuest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MultiChoiceQuest>
 *
 * @method MultiChoiceQuest|null find($id, $lockMode = null, $lockVersion = null)
 * @method MultiChoiceQuest|null findOneBy(array $criteria, array $orderBy = null)
 * @method MultiChoiceQuest[]    findAll()
 * @method MultiChoiceQuest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MultiChoiceQuestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MultiChoiceQuest::class);
    }

//    /**
//     * @return MultiChoiceQuest[] Returns an array of MultiChoiceQuest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MultiChoiceQuest
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
