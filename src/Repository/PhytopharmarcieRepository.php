<?php

namespace App\Repository;

use App\Entity\Phytopharmarcie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Phytopharmarcie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Phytopharmarcie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Phytopharmarcie[]    findAll()
 * @method Phytopharmarcie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhytopharmarcieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Phytopharmarcie::class);
    }

     /**
      * @return Phytopharmarcie[] Returns an array of Phytopharmarcie objects
      */
  
    public function findByCulture($value):array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.culture = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findBySociete($value):array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.societe = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }
   
    
    public function findOneBySomeField($value): ?Phytopharmarcie
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.culture = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
