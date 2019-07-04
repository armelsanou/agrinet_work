<?php

namespace App\Repository;

use App\Entity\BibliothequeRecherche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BibliothequeRecherche|null find($id, $lockMode = null, $lockVersion = null)
 * @method BibliothequeRecherche|null findOneBy(array $criteria, array $orderBy = null)
 * @method BibliothequeRecherche[]    findAll()
 * @method BibliothequeRecherche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequeRechercheRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BibliothequeRecherche::class);
    }

    // /**
    //  * @return BibliothequeRecherche[] Returns an array of BibliothequeRecherche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BibliothequeRecherche
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * Undocumented function
     *
     * @param BibliothequeRecherche $search
     * @return Query
     */
    public function findAllVisibleQuery(BibliothequeRecherche $search) :Query
    {
        $query =$this->findVisibleQuery();
        
        if ($search->getCategorie()) {
            $query = $query 
                    ->andwhere('c.categorie = :categorie')
                    -setParameter('categorie', $search->getCategorie());
        }
        if ($search->getCultureElevage()) {
            $query = $query 
                    ->andwhere('c.cultureElevage = :cultureelevage')
                    -setParameter('cultureElevage', $search->getCultureElevage());
        }
        if ($search->getLocaliteRegion()) {
            $query = $query 
                    ->andwhere('c.LocaliteRegion = :localiteregion')
                    -setParameter('localiteregion', $search->getLocaliteRegion());
        }
        
        return $query->getQuery();
    }
}
