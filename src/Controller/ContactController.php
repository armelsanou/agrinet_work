<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
         * @Route("/contact", name ="contactez_nous")
         */
        public function contactez_nous(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }
}
