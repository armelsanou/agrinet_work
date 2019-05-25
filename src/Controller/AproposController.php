<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AproposController extends AbstractController
{
    /**
         * @Route("/a_propos", name ="a_propos_de_nous")
         */
        public function a_propos(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('apropos/a_propos.html.twig', [
            'controller_name' => 'AproposController',
            'form' => $form->createView()
        ]);
    }
}
