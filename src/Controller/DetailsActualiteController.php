<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Actualite;
use App\Form\RegistrationType;
use App\Controller\ActualiteController;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailsActualiteController extends AbstractController
{
    /**
     * @Route("/details/article/{id}", name="details_actualite")
     * @return Response
     */
    public function details_actualite(ActualiteRepository $actualiteRepository,Actualite $actualite )
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        
       
        return $this->render('details_article/details_article.html.twig', [
            
            'controller_name' => 'DetailsActualiteController',
            'all_actualite'=>$actualiteRepository->findAll(),
            'form' => $form->createView(),
            'actualite'=>$actualite,
            'id'=>$actualite->getId()
           
            
        ]);
    }


    
}