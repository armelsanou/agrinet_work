<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormationInitialeController extends AbstractController
{
    /**
         * @Route("/formation_initiale", name ="formation_initiale")
         */
        public function formation_initiale(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('formation_initiale/formation_initiale.html.twig', [
            'controller_name' => 'FormationInitialeController',
            'form' => $form->createView()
        ]);
    }
}
