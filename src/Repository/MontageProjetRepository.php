<?php

namespace App\Repository;

use App\Entity\MontageProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MontageProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method MontageProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method MontageProjet[]    findAll()
 * @method MontageProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MontageProjetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MontageProjet::class);
    }

    // /**
    //  * @return MontageProjet[] Returns an array of MontageProjet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MontageProjet
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
