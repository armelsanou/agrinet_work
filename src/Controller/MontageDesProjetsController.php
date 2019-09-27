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
use App\Entity\MontageProjet;
use App\Form\MontageProjetType;
use App\Repository\MontageProjetRepository;



class MontageDesProjetsController extends AbstractController
{
    /**
         * @Route("/montage_projets", name ="montage_projets")
         */
        public function montage_projets(Request $request, 
                                            ActualiteRepository $listActualiteRepository,
                                            UserPasswordEncoderInterface $encoder, 
                                            ObjectManager $manager, 
                                            SecurityController $injector){
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
             $montageProjet = new MontageProjet();
             $formMontageProjet = $this->createForm(MontageProjetType::class, $montageProjet);
             $formMontageProjet->handleRequest($request);
     
             if ($formMontageProjet->isSubmitted() && $formMontageProjet->isValid()) {
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($montageProjet);
                 $entityManager->flush();
     
                 return $this->redirectToRoute('montage_projets');
             }
            return $this->render('montage_des_projets/montage_projets.html.twig', [
                'controller_name' => 'MontageDesProjetsController',
                'form' => $form->createView(),
                'formMontageProjet' => $formMontageProjet->createView(),
            ]);
    }
}
