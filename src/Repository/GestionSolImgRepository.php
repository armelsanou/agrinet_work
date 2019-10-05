<?php

namespace App\Repository;

use App\Entity\GestionSolImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GestionSolImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method GestionSolImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method GestionSolImg[]    findAll()
 * @method GestionSolImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestionSolImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GestionSolImg::class);
    }

    // /**
    //  * @return GestionSolImg[] Returns an array of GestionSolImg objects
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
    public function findOneBySomeField($value): ?GestionSolImg
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
