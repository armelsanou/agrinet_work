<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MontageDesProjetsController extends AbstractController
{
    /**
         * @Route("/montage_projets", name ="montage_projets")
         */
        public function montage_projets(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('montage_des_projets/montage_projets.html.twig', [
            'controller_name' => 'MontageDesProjetsController',
            'form' => $form->createView()
        ]);
    }
}
