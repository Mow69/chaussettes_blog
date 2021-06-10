<?php

namespace App\Repository;

use App\Entity\Sock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sock|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sock|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sock[]    findAll()
 * @method Sock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sock::class);
    }

    // /**
    //  * @return Sock[] Returns an array of Sock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sock
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
