<?php

namespace App\Repository;

use App\Entity\MontageProImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MontageProImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method MontageProImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method MontageProImg[]    findAll()
 * @method MontageProImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MontageProImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MontageProImg::class);
    }

    // /**
    //  * @return MontageProImg[] Returns an array of MontageProImg objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MontageProImg
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
