<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrganisationController extends AbstractController
{
    /**
     * @Route("/organisation", name="organisation")
     */
    public function index()
    {
        $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('organisation/index.html.twig', [
            'controller_name' => 'OrganisationController',
            'form' => $form->createView()
        ]);
    }
}
