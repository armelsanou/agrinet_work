<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecapCultureController extends AbstractController
{
    /**
         * @Route("/recap_culture", name ="recap_culture")
         */
        public function recap_culture(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('recap_culture/recap_culture.html.twig', [
            'controller_name' => 'RecapCultureController',
            'form' => $form->createView()
        ]);
    }
}
