<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\SecurityController;
use App\Repository\ActualiteRepository;
use App\Entity\DemandeFormation;
use App\Form\DemandeFormationType;
use App\Repository\DemandeFormationRepository;
use App\Repository\FormationInitImgRepository;

class FormationInitialeController extends AbstractController
{
    /**
         * @Route("/formation_initiale", name ="formation_initiale")
         */
        public function formation_initiale(Request $request, 
                                            ActualiteRepository $listActualiteRepository,
                                            UserPasswordEncoderInterface $encoder, 
                                            ObjectManager $manager,
                                            FormationInitImgRepository $formationInitImgRepository,
                                            SecurityController $injector){
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);
            $user = new User();
            $demandeFormation = new DemandeFormation();
            $formFormation = $this->createForm(DemandeFormationType::class, $demandeFormation);
            $formFormation->handleRequest($request);
             $form = $this->createForm(RegistrationType::class, $user);
             if ($formFormation->isSubmitted() && $formFormation->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($demandeFormation);
                $entityManager->flush();
    
                return $this->redirectToRoute('formation_initiale');
            }
        return $this->render('formation_initiale/formation_initiale.html.twig', [
            'controller_name' => 'FormationInitialeController',
            'formFormation' => $formFormation->createView(),
            'formation_init_imgs' => $formationInitImgRepository->findAll(),
            'form' => $form->createView()
        ]);
    }


     
}
