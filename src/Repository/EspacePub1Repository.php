<?php

namespace App\Repository;

use App\Entity\EspacePub1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EspacePub1|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspacePub1|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspacePub1[]    findAll()
 * @method EspacePub1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspacePub1Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EspacePub1::class);
    }

    // /**
    //  * @return EspacePub1[] Returns an array of EspacePub1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EspacePub1
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
