<?php

namespace App\Repository;

use App\Entity\CommandBibliothequeAgricole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommandBibliothequeAgricole|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandBibliothequeAgricole|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandBibliothequeAgricole[]    findAll()
 * @method CommandBibliothequeAgricole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandBibliothequeAgricoleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommandBibliothequeAgricole::class);
    }

    // /**
    //  * @return CommandBibliothequeAgricole[] Returns an array of CommandBibliothequeAgricole objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommandBibliothequeAgricole
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
