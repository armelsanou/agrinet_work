<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgriImpactController extends AbstractController
{
    /**
         * @Route("/agri_impact", name ="agri_impact")
         */
        public function agri_impact(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('agri_impact/agri_impact.html.twig', [
            'controller_name' => 'AgriImpactController',
            'form' => $form->createView()
        ]);
    }
}
