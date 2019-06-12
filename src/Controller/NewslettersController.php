<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Newsletters;
use App\Form\NewslettersType;
use App\Form\RegistrationType;
use App\Repository\NewslettersRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewslettersController extends AbstractController
{
    /**
     * @Route("/newsletters", name="newsletters")
     */
    public function index(ObjectManager $manager, NewslettersRepository $BibliothequeRepository, Request $request)
    {
         $user = new User();
           $form = $this->createForm(RegistrationType::class, $user);
           $form->handleRequest($request);
         $newsletters = new Newsletters();
            $formNewsletters = $this->createForm(NewslettersType::class,  $newsletters);

             $formNewsletters->handleRequest($request);
             if($formNewsletters->isSubmitted() && $formNewsletters->isValid()){

                   $manager->persist($newsletters);
                   $manager->flush();
                   $this->addFlash('success', 'envoyer.');
 
           return $this->RedirectToRoute('newsletters'); 
 
            
                } 
        return $this->render('newsletters/index.html.twig', [
            'controller_name' => 'NewslettersController',
             'formNewsletters' =>$formNewsletters->createView(),
              'form' => $form->createView(),
        ]);
    }
}
