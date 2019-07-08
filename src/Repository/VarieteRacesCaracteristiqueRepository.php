<?php

namespace App\Repository;

use App\Entity\BibliothequeRecherche;
use App\Entity\VarieteRacesCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VarieteRacesCaracteristique|null find($id, $lockMode = null, $lockVersion = null)
 * @method VarieteRacesCaracteristique|null findOneBy(array $criteria, array $orderBy = null)
 * @method VarieteRacesCaracteristique[]    findAll()
 * @method VarieteRacesCaracteristique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VarieteRacesCaracteristiqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VarieteRacesCaracteristique::class);
    }

    // /**
    //  * @return VarieteRacesCaracteristique[] Returns an array of VarieteRacesCaracteristique objects
    //  */

    public function findVarietyByCategory($category,$culture,$localite)
    {
       $qb = $this->createQueryBuilder('v')
       ->select('v')
        ->leftJoin(BibliothequeRecherche::class,'b','WITH','v.IdBibliothequeRecherche=b.id')
           ->andWhere('b.categorie = :val1')
           ->andWhere('b.cultureElevage= :val2')
           ->andWhere('b.localiteRegion = :val3')
           ->setParameter('val1',$category)
           ->setParameter('val2',$culture)
           ->setParameter('val3',$localite)
       ;
       dump( $qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }

    /*
        public function findByExampleField($value)
        {
            return $this->createQueryBuilder('v')
                ->andWhere('v.exampleField = :val')
                ->setParameter('val', $value)
                ->orderBy('v.id', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
        }
        */

    /*
    public function findOneBySomeField($value): ?VarieteRacesCaracteristique
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
