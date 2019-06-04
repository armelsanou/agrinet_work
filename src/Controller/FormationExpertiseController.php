<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormationExpertiseController extends AbstractController
{
    /**
         * @Route("/formation_expertise", name ="formation_expertise")
         */
        public function formation_expertise(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('formation_expertise/formation_expertise.html.twig', [
            'controller_name' => 'FormationExpertiseController',
            'form' => $form->createView()
        ]);
    }
}
