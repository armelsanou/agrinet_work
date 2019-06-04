<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MieuxProduireController extends AbstractController
{
        /**
         * @Route("/mieux_produire", name ="mieux_produire")
         */
        public function mieux_produire(){
            $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('mieux_produire/mieux_produire.html.twig', [
            'controller_name' => 'MieuxProduireController',
            'form' => $form->createView()
        ]);
    }
}
