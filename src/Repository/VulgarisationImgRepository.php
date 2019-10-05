<?php

namespace App\Repository;

use App\Entity\VulgarisationImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VulgarisationImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method VulgarisationImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method VulgarisationImg[]    findAll()
 * @method VulgarisationImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VulgarisationImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VulgarisationImg::class);
    }

    // /**
    //  * @return VulgarisationImg[] Returns an array of VulgarisationImg objects
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
    public function findOneBySomeField($value): ?VulgarisationImg
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
