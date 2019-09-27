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
use App\Entity\RenforcementCapacite;
use App\Form\RenforcementCapaciteType;
use App\Repository\RenforcementCapaciteRepository;

class FormationPratiqueController extends AbstractController
{
    /**
         * @Route("/formation_pratique", name ="formation_pratique", methods={"GET", "POST"})
         */
        public function formation_pratique(Request $request, 
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
             $renforcementCapacite = new RenforcementCapacite();
             $formRenforcement = $this->createForm(RenforcementCapaciteType::class, $renforcementCapacite);
             $formRenforcement->handleRequest($request);
     
             if ($formRenforcement->isSubmitted() && $formRenforcement->isValid()) {
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($renforcementCapacite);
                 $entityManager->flush();
     
                 return $this->redirectToRoute('formation_pratique');
             }
     
        return $this->render('formation_pratique/formation_pratique.html.twig', [
            'controller_name' => 'FormationPratiqueController',
            'form' => $form->createView(),
            'formRenforcement' => $formRenforcement->createView()
        ]);
    }
}
