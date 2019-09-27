<?php

namespace App\Repository;

use App\Entity\GestionDuSol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GestionDuSol|null find($id, $lockMode = null, $lockVersion = null)
 * @method GestionDuSol|null findOneBy(array $criteria, array $orderBy = null)
 * @method GestionDuSol[]    findAll()
 * @method GestionDuSol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestionDuSolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GestionDuSol::class);
    }

    // /**
    //  * @return GestionDuSol[] Returns an array of GestionDuSol objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GestionDuSol
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
