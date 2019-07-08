<?php

namespace App\Repository;

use App\Entity\AgriFinanceCategorie;
use App\Entity\AgriFinanceStructure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AgriFinanceStructure|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgriFinanceStructure|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgriFinanceStructure[]    findAll()
 * @method AgriFinanceStructure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgriFinanceStructureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AgriFinanceStructure::class);
    }

    // /**
    //  * @return AgriFinanceStructure[] Returns an array of AgriFinanceStructure objects
    //  */

    public function findByCategorie($categorie)
    {
        $qb = $this->createQueryBuilder('v')
            ->select('v')
            ->leftJoin(AgriFinanceCategorie::class,'a','WITH','v.idCategorie=a.id')
            ->andWhere('a.categorie = :val')
            ->setParameter('val',$categorie)

        ;
        dump( $qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }

    /*
    public function findOneBySomeField($value): ?AgriFinanceStructure
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
