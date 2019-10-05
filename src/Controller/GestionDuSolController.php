<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Controller\SecurityController;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\GestionDuSol;
use App\Form\GestionDuSolType;
use App\Repository\GestionDuSolRepository;
use App\Repository\GestionSolImgRepository;
class GestionDuSolController extends AbstractController
{
    /**
         * @Route("/gestion_du_sol", name ="gestion_du_sol")
         */
        public function gestion_du_sol(Request $request, 
                                            ActualiteRepository $listActualiteRepository,
                                            UserPasswordEncoderInterface $encoder, 
                                            ObjectManager $manager,GestionSolImgRepository $gestionSolImgRepository, 
                                            SecurityController $injector){
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
             $gestionDuSol = new GestionDuSol();
             $formGestionSol = $this->createForm(GestionDuSolType::class, $gestionDuSol);
             $formGestionSol->handleRequest($request);
     
             if ($formGestionSol->isSubmitted() && $formGestionSol->isValid()) {
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($gestionDuSol);
                 $entityManager->flush();
     
                 return $this->redirectToRoute('gestion_du_sol');
             }
     
        return $this->render('gestion_du_sol/gestion_du_sol.html.twig', [
            'controller_name' => 'GestionDuSolController',
            'form' => $form->createView(),
            'formGestionSol' => $formGestionSol->createView(),
            'gestion_sol_imgs' => $gestionSolImgRepository->findAll(),
        ]);
    }
}
