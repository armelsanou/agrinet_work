<?php

namespace App\Repository;

use App\Entity\Bibliotheque;
use App\Entity\VarieteRacesCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bibliotheque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliotheque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliotheque[]    findAll()
 * @method Bibliotheque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bibliotheque::class);
    }

     /**
      * @return Bibliotheque[] Returns an array of Bibliotheque objects
      */

    public function findVarietyByCategory($idCategory)
    {
        $qb = $this->createQueryBuilder('v')
            ->select('v')
            ->leftJoin(Category::class,'c',
                'WITH',
                'c= v.category')
            ->where('v.enabled = 1')
            ->andWhere('v.deleted = 0')
            ->setParameter("category", $idCategory);
        return $qb->getQuery()->getResult();
    }

    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bibliotheque
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
