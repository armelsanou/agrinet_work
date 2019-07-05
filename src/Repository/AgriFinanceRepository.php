<?php

namespace App\Repository;

use App\Entity\AgriFinance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Form\AgriFinanceType;
/**
 * @method AgriFinance|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgriFinance|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgriFinance[]    findAll()
 * @method AgriFinance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgriFinanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AgriFinance::class);
    }

     /**
      * @return AgriFinance[] Returns an array of AgriFinance objects
      */
    
    public function findByCategorie($value):array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.categorie = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?AgriFinance
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
