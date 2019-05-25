<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Bibliotheque;
use App\Form\BibliothequeType;
use App\Form\RegistrationType;
use App\Repository\BibliothequeRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BibliothequeController extends AbstractController
{
         /**
         * @Route("/bibliotheque_agricole", name ="bibliotheque_agricole")
         */
        public function bibliotheque_agricole(ObjectManager $manager, BibliothequeRepository $BibliothequeRepository, Request $request){
            $user = new User();
            $bibliotheque = new Bibliotheque();

            $formBibliotheque = $this->createForm(BibliothequeType::class,  $bibliotheque);

             $form = $this->createForm(RegistrationType::class, $user);
             $formBibliotheque->handleRequest($request);
             if($formBibliotheque->isSubmitted() && $formBibliotheque->isValid()){
 
                $file=$bibliotheque->getName();
                 $fileName= md5(uniqid()).'.'.$file->guessExtension();
                 $file->move($this->getParameter('upload_directoy'), $fileName);
 
                 $bibliotheque->setName($fileName);
               
 
                   $manager->persist($bibliotheque);
                   $manager->flush();
                   $this->addFlash('success', 'Votre compte à bien été enregistré.');
 
           return $this->RedirectToRoute('bibliotheque_agricole'); 
 
            
                } 
        return
            $this->render('bibliotheque/bibliotheque_agricole.html.twig', [
                'form' => $form->createView(),
                'formBibliotheque' =>$formBibliotheque->createView(),
                'bibliothequeDoc'=>$BibliothequeRepository->findAll(),
            ]);
        
      
    }
}

