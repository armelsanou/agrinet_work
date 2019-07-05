<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Actualite;
use App\Form\RegistrationType;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Controller\SecurityController;

class AgriImpactController extends AbstractController
{
    /**
         * @Route("/agri_impact", name ="agri_impact")
         */
        public function agri_impact(ObjectManager $manager, 
                                    ActualiteRepository $listActualiteRepository, 
                                    Request $request,
                                    UserPasswordEncoderInterface $encoder,
                                    SecurityController $injector){
  try
    {
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);

            $user = new User();
            $actualite = new Actualite();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('agri_impact/agri_impact.html.twig', [
            'controller_name' => 'AgriImpactController',
            'form' => $form->createView(),
            'listeActu'=>$listActualiteRepository->findAll()
        ]);
        
    }catch(Exception $exception){
                $this->addFlash('errorConnexion', 'Please Check your connexion!');
        }
    }
}
