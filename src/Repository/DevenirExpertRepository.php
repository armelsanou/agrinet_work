<?php

namespace App\Repository;

use App\Entity\DevenirExpert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DevenirExpert|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevenirExpert|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevenirExpert[]    findAll()
 * @method DevenirExpert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevenirExpertRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DevenirExpert::class);
    }

    // /**
    //  * @return DevenirExpert[] Returns an array of DevenirExpert objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DevenirExpert
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
