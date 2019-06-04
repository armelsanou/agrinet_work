<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name ="security_welcome")
         */
        public function welcome(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
             return
             $this->render('home/home.html.twig', [
                'form' => $form->createView()
            ]);
        }
}
