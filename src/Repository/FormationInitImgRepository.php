<?php

namespace App\Repository;

use App\Entity\FormationInitImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FormationInitImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormationInitImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormationInitImg[]    findAll()
 * @method FormationInitImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationInitImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FormationInitImg::class);
    }

    // /**
    //  * @return FormationInitImg[] Returns an array of FormationInitImg objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormationInitImg
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
