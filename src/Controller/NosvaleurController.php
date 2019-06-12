<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NosvaleurController extends AbstractController
{
    /**
     * @Route("/nosvaleur", name="nosvaleur")
     */
    public function index()
    
    {
        $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('nosvaleur/index.html.twig', [
            'controller_name' => 'NosvaleurController',
             'form' => $form->createView()
        ]);
    }
}
