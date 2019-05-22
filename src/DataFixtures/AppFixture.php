<?php
namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Phytopharmarcie();
            $product->setCulture('phyto '.$i);
            $product->setEnemie('enemie'.$i);
            $product->setNomCommercial('commerce'.$i);
            $product->setSociete('societe'.$i);
            $product->setMatiereActive('matiere'.$i);
            $product->setClasse('classe'.$i);
            $manager->persist($product);
        }

        $manager->flush();
    }
}