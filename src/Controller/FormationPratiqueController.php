<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormationPratiqueController extends AbstractController
{
    /**
         * @Route("/formation_pratique", name ="formation_pratique")
         */
        public function formation_pratique(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('formation_pratique/formation_pratique.html.twig', [
            'controller_name' => 'FormationPratiqueController',
            'form' => $form->createView()
        ]);
    }
}
