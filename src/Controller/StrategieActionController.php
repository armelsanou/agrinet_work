<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StrategieActionController extends AbstractController
{
    /**
     * @Route("/strategie/action", name="strategie_action")
     */
    public function index()
    {
          $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('strategie_action/index.html.twig', [
            'controller_name' => 'StrategieActionController',
                'form' => $form->createView()
        ]);
    }
}
