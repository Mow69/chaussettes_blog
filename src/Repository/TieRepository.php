<?php

namespace App\Repository;

use App\Entity\Tie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tie[]    findAll()
 * @method Tie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tie::class);
    }

    // /**
    //  * @return Tie[] Returns an array of Tie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tie
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
