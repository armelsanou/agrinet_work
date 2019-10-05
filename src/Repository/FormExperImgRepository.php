<?php

namespace App\Repository;

use App\Entity\FormExperImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FormExperImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormExperImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormExperImg[]    findAll()
 * @method FormExperImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormExperImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FormExperImg::class);
    }

    // /**
    //  * @return FormExperImg[] Returns an array of FormExperImg objects
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
    public function findOneBySomeField($value): ?FormExperImg
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
