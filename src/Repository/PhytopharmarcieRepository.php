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

    //méthode qui va permettre de faire la recherche suivant plusieurs critères
    /**
      * @param Phytopharmacie $search
      * @return Query
      */
    public function findAllVisibleQuery(Phytopharmarcie $search) :Query
    {
        $query = $this->findVisibleQuery();

        if ($search->getCulture()) {
           $query = Doctrine_Query::create()
                    ->andWhere('p.culture = :culture')
                    ->setParameter('culture', $search->getCulture());
        }

        if ($search->getEnemie()) {
           $query = $query
                    ->andWhere('p.enemie = :enemie')
                    ->setParameter('enemie', $search->getEnemie());
        }

        if ($search->getNomCommercial()) {
           $query = $query
                    ->andWhere('p.nomCommercial = :nomCommercial')
                    ->setParameter('nomCommercial', $search->getNomCommercial());
        }

        /* if ($search->getSociete()) {
           $query = $query
                    ->andWhere('p.societe = :societe')
                    ->setParameter('societe', $search->getSociete());
        }

        if ($search->getMatiereActive()) {
           $query = $query
                    ->andWhere('p.matiereActive = :matiereActive')
                    ->setParameter('matiereActive', $search->getMatiereActive());
        }

        if ($search->getClasse()) {
           $query = $query
                    ->andWhere('p.classe = :classe')
                    ->setParameter('classe', $search->getClasse());
        }
 */
        return $query->getQuery();
    }

    private function findVisibleQuery() :QueryBuilder
    {
        return $this->createQueryBuilder('p');
              //->where('p.culture = test');
    }
    
}
