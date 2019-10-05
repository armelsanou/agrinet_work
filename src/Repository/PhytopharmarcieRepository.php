<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Entity\Phytopharmarcie;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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


    public function findByCultEnMa($culture,$ennemie):array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.culture = :val1')
            ->andWhere('p.enemie = :val2')
            ->setParameter('val1', $culture)
            ->setParameter('val2', $ennemie)
            ->getQuery()
            ->getResult()
            ;
    }
    /*

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

       public function findByEnemie($value):array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.enemie = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getResult()
           ;
       }

       public function findByNomCommercial($value):array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.nomCommercial = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getResult()
           ;
       }

       public function findByMatiereActive($value):array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.matiereActive = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getResult()
           ;
       }

       public function findByClasse($value):array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.classe = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getResult()
           ;
       }
       public function findByLocalite($value):array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.localite = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getResult()
           ;
       }
       public function findByNiveauToxicite($value):array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.niveauToxicite = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getResult()
           ;
       }

     /*
       public function findOneBySomeField($value): ?Phytopharmarcie
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.culture = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getOneOrNullResult()
           ;
       } */


    
}
