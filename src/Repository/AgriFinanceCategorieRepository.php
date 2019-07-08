<?php

namespace App\Repository;

use App\Entity\AgriFinanceCategorie;
use App\Entity\AgriFinanceStructure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AgriFinanceCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgriFinanceCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgriFinanceCategorie[]    findAll()
 * @method AgriFinanceCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgriFinanceCategorieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AgriFinanceCategorie::class);
    }
    public function findByStructure($structure)
    {
        $qb = $this->createQueryBuilder('v')
            ->select('v')
            ->leftJoin(AgriFinanceStructure::class,'a','WITH','v.id=a.idCategorie')
            ->andWhere('a.structure = :val')
            ->setParameter('val',$structure)

        ;
        dump( $qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }


    // /**
    //  * @return AgriFinanceCategorie[] Returns an array of AgriFinanceCategorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AgriFinanceCategorie
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
