<?php

namespace App\Repository;

use App\Entity\FormPratiqueImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FormPratiqueImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormPratiqueImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormPratiqueImg[]    findAll()
 * @method FormPratiqueImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormPratiqueImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FormPratiqueImg::class);
    }

    // /**
    //  * @return FormPratiqueImg[] Returns an array of FormPratiqueImg objects
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
    public function findOneBySomeField($value): ?FormPratiqueImg
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
