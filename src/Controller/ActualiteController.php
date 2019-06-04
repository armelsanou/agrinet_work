<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Actualite;
use App\Form\RegistrationType;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActualiteController extends AbstractController
{
    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualite(ObjectManager $manager, ActualiteRepository $actualiteRepository, Request $request)
    {
        $actualite_liste = new Actualite(); 
        $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('actualite/actualite.html.twig', [
            'controller_name' => 'ActualiteController',
            'all_actualite'=>$actualiteRepository->findAll(),
            'form' => $form->createView()
        ]);
    }
}
