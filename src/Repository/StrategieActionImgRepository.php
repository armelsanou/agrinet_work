<?php

namespace App\Repository;

use App\Entity\StrategieActionImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StrategieActionImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method StrategieActionImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method StrategieActionImg[]    findAll()
 * @method StrategieActionImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StrategieActionImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StrategieActionImg::class);
    }

    // /**
    //  * @return StrategieActionImg[] Returns an array of StrategieActionImg objects
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
    public function findOneBySomeField($value): ?StrategieActionImg
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
