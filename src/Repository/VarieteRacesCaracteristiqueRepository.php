<?php

namespace App\Repository;

use App\Entity\VarieteRacesCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
