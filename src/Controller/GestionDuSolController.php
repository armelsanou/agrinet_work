<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GestionDuSolController extends AbstractController
{
    /**
         * @Route("/gestion_du_sol", name ="gestion_du_sol")
         */
        public function gestion_du_sol(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('gestion_du_sol/gestion_du_sol.html.twig', [
            'controller_name' => 'GestionDuSolController',
            'form' => $form->createView()
        ]);
    }
}
