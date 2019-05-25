<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VulgarisationController extends AbstractController
{
    /**
         * @Route("/vulgarisation_agricole", name ="vulgarisation_agricole")
         */
        public function vulgarisation_agricole(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('vulgarisation/vulgarisation_agricole.html.twig', [
            'controller_name' => 'VulgarisationController',
            'form' => $form->createView()
        ]);
    }
}
