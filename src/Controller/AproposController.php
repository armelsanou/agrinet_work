<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\SecurityController;
use App\Repository\ActualiteRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AproposController extends AbstractController
{
    /**
         * @Route("/a_propos", name ="a_propos_de_nous")
         */
        public function a_propos(Request $request, 
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
        return $this->render('apropos/a_propos.html.twig', [
            'controller_name' => 'AproposController',
            'form' => $form->createView()
        ]);
    }
}
