<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevenirExpertController extends AbstractController
{
    /**
         * @Route("/devenir_expert", name ="devenir_expert")
         */
        public function devenir_expert(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('devenir_expert/devenir_expert.html.twig', [
            'controller_name' => 'DevenirExpertController',
            'form' => $form->createView()
        ]);
    }
}
