<?php

namespace App\Repository;

use App\Entity\RecapElevage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RecapElevage|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecapElevage|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecapElevage[]    findAll()
 * @method RecapElevage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecapElevageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RecapElevage::class);
    }

    // /**
    //  * @return RecapElevage[] Returns an array of RecapElevage objects
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
    public function findOneBySomeField($value): ?RecapElevage
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
