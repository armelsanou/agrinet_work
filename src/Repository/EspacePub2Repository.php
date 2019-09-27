<?php

namespace App\Repository;

use App\Entity\EspacePub2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EspacePub2|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspacePub2|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspacePub2[]    findAll()
 * @method EspacePub2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspacePub2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EspacePub2::class);
    }

    // /**
    //  * @return EspacePub2[] Returns an array of EspacePub2 objects
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
    public function findOneBySomeField($value): ?EspacePub2
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
