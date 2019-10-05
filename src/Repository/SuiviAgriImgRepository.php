<?php

namespace App\Repository;

use App\Entity\SuiviAgriImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SuiviAgriImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuiviAgriImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuiviAgriImg[]    findAll()
 * @method SuiviAgriImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiviAgriImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SuiviAgriImg::class);
    }

    // /**
    //  * @return SuiviAgriImg[] Returns an array of SuiviAgriImg objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SuiviAgriImg
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
