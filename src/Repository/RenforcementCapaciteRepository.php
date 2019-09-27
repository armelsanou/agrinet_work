<?php

namespace App\Repository;

use App\Entity\RenforcementCapacite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RenforcementCapacite|null find($id, $lockMode = null, $lockVersion = null)
 * @method RenforcementCapacite|null findOneBy(array $criteria, array $orderBy = null)
 * @method RenforcementCapacite[]    findAll()
 * @method RenforcementCapacite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RenforcementCapaciteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RenforcementCapacite::class);
    }

    // /**
    //  * @return RenforcementCapacite[] Returns an array of RenforcementCapacite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RenforcementCapacite
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
