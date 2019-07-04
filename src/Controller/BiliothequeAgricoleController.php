<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\VarieteRacesCaracteristique;
use App\Entity\Command;
use App\Form\CommandType;
use App\Form\RegistrationType;
use App\Entity\BibliothequeRecherche;
use App\Form\BibliothequeRechercheType;
use App\Repository\BibliothequeRepository;
use App\Form\VarieteRacesCaracteristiqueType;
use App\Repository\PhytopharmarcieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BibliothequeRechercheRepository;
use App\Repository\VarieteRacesCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BiliothequeAgricoleController extends AbstractController
{
    /**
     * @Route("/bibliotheque_agricole", name="bibliotheque_agricole")
     */
    public function index(ObjectManager $manager, BibliothequeRechercheRepository $bibliothequeRechercheRepository, Request $request)
    {
            $user = new User();
        dump($user);
        $variete = new VarieteRacesCaracteristique();
        dump($variete);
        $formvrc = $this->createForm(VarieteRacesCaracteristiqueType::class, $variete);
            
     
            $form = $this->createForm(RegistrationType::class, $user);
            $command = new Command();
            $formCommand = $this->createForm(CommandType::class, $command);

            $bibliothequeRecherche= new BibliothequeRecherche();
            $formrecherche = $this->createForm(BibliothequeRechercheType::class, $bibliothequeRecherche);
            $formvrc = $this->createForm(VarieteRacesCaracteristiqueType::class, $variete);
            
            $formvrc->handleRequest($request);
            
            if($formvrc->isSubmitted() && $formvrc->isValid()){
          
                 $manager->persist($variete);
                 $manager->flush();
                 $this->addFlash('success', 'variété enregistrée.');
               return $this->RedirectToRoute('bibliotheque_agricole'); 
         }
            
        return $this->render('bibliotheque_agricole/bibliotheque_agricole_recherche.html.twig', [
            'formCommand' => $formCommand->createView(),
            'form' => $form->createView(),
            'formrecherche' => $formrecherche->createView(),
            'listeBiblioRecherche' =>  $bibliothequeRechercheRepository->findAll(),
            'formvrc'=>$formvrc->createView(),
        ]);
    }
  
}
