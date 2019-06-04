<?php

namespace App\Controller;

use App\Entity\User;
<<<<<<< HEAD
use App\Form\RegistrationType;
=======
use App\Entity\Actualite;
use App\Form\RegistrationType;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgriImpactController extends AbstractController
{
    /**
         * @Route("/agri_impact", name ="agri_impact")
         */
<<<<<<< HEAD
        public function agri_impact(){
            $user = new User();
=======
        public function agri_impact(ObjectManager $manager, ActualiteRepository $listActualiteRepository, Request $request){
            $user = new User();
            $actualite = new Actualite();
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('agri_impact/agri_impact.html.twig', [
            'controller_name' => 'AgriImpactController',
<<<<<<< HEAD
            'form' => $form->createView()
=======
            'form' => $form->createView(),
            'listeActu'=>$listActualiteRepository->findAll()
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
        ]);
    }
}
