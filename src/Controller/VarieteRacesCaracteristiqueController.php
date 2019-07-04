<?php

namespace App\Controller;

use App\Entity\VarieteRacesCaracteristique;
use App\Form\VarieteRacesCaracteristiqueType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BiliothequeAgricoleController;
use App\Repository\BibliothequeRechercheRepository;
use App\Repository\VarieteRacesCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VarieteRacesCaracteristiqueController extends AbstractController
{
    /**
     * @Route("/variete/races/caracteristique", name="variete_races_caracteristique")
     */
    public function index(ObjectManager $manager, VarieteRacesCaracteristiqueRepository $vrc, Request $request)
    {
       

        $variete = new VarieteRacesCaracteristique();
  
            $formvrc = $this->createForm(VarieteRacesCaracteristiqueType::class, $variete);
            
            $formvrc->handleRequest($request);
            
            if($formvrc->isSubmitted() && $formvrc->isValid()){
          
                 $manager->persist($variete);
                 $manager->flush();
                 $this->addFlash('success', 'variété enregistrée.');
               return $this->RedirectToRoute('bibliotheque_agricole'); 
         }

        return $this->render('bibliotheque_agricole/bibliotheque_agricole_recherche.html.twig', [
            'formvrc' => $formvrc->createView()
        ]);
    }
}
