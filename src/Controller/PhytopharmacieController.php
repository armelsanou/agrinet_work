<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Command;
use App\Form\CommandType;
use App\Form\RegistrationType;

use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmacieType;
use App\Repository\PhytopharmarcieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PhytopharmacieController extends AbstractController
{

    /**
         * @Route("/phytopharmacie", name ="phytopharmacie")
         */
        public function phytopharmacie(ObjectManager $manager, PhytopharmarcieRepository $phytopharmarcieRepository, Request $request): Response{
           
            $command = new Command();
            $formCommand = $this->createForm(CommandType::class, $command);
            $user = new User();
            $phytopharmacie = new Phytopharmarcie();
            $formulaire = $this->createForm(PhytopharmacieType::class, $phytopharmacie);
            
             $form = $this->createForm(RegistrationType::class, $user);
            $culture=$request->get("culture");
            $enemie=$request->get("enemie");
            $resultCulture = $phytopharmarcieRepository->findByCulture($culture);
            $resultEnemie = $phytopharmarcieRepository-> findByEnemie( $enemie);
           
             $resultNomCommercial = $phytopharmarcieRepository->findByNomCommercial($phytopharmacie->getNomCommercial());
             $resultSociete = $phytopharmarcieRepository->findBySociete($phytopharmacie->getSociete());
             $resultMatiereActive = $phytopharmarcieRepository->findByMatiereActive($phytopharmacie->getMatiereActive());
             $resultClasse = $phytopharmarcieRepository->findByClasse($phytopharmacie->getClasse());
             $resultLocalite = $phytopharmarcieRepository->findByLocalite($phytopharmacie->getLocalite());
             $resultNiveauToxicite = $phytopharmarcieRepository->findByNiveauToxicite($phytopharmacie->getNiveauToxicite());
             $formulaire->handleRequest($request);
             dump($resultNomCommercial);
             if($formulaire->isSubmitted() && $formulaire->isValid()){
           
                  $manager->persist($phytopharmacie);
                  $manager->flush();
                  $this->addFlash('success', 'bien enregistré.');
                return $this->RedirectToRoute('phytopharmacie'); 
          }
        
            return
            $this->render('phytopharmacie/phytopharmacie.html.twig'
            , [
                'controller_name' => 'PhytopharmacieController',
                'form' => $form->createView(),
                'formulaire' => $formulaire->createView(),
                'curent'=>$phytopharmacie,
                'listePhyto' =>  $phytopharmarcieRepository->findAll(),
                'resultNomCommercial' => $resultNomCommercial,
                'resultSociete' => $resultSociete,
                'resultMatiereActive' => $resultMatiereActive,
                'resultClasse' => $resultClasse,
                'resultLocalite' => $resultLocalite,
                'resultNiveauToxicite' => $resultNiveauToxicite,
               'resultCulture' => $resultCulture,
               'resultEnemie' => $resultEnemie,
                 'formCommand' => $formCommand->createView()

            ]);
    }

}
