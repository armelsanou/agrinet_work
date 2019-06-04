<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BibliothequeController extends AbstractController
{
    /**
         * @Route("/bibliotheque_agricole", name ="bibliotheque_agricole")
         */
        /* public function bibliotheque_agricole(ObjectManager $manager, BibliothequeRepository $BibliothequeRepository, Request $request){
            $user = new User();
            $bibliotheque = new Bibliotheque();

            $formBibliotheque = $this->createForm(BibliothequeType::class,  $bibliotheque);

             $form = $this->createForm(RegistrationType::class, $user);
             $formBibliotheque->handleRequest($request);
             if($formBibliotheque->isSubmitted() && $formBibliotheque->isValid()){
 
                $file=$formBibliotheque->getName();
                 $fileName= md5(uniqid()).'.'.$file->guessExtension();
                 $file->move($this->getParameter('upload_directoy'), $fileName);
 
                 $formBibliotheque->setName($fileName);
               
 
                   $manager->persist($formBibliotheque);
                   $manager->flush();
                   $this->addFlash('success', 'Votre compte à bien été enregistré.');
 
                  
                /*    return $this->RedirectToRoute('security_welcome'); */
 
/*
            return
            $this->render('bibliotheque/bibliotheque_agricole.html.twig', [
                'form' => $form->createView(),
                'formBibliotheque' =>$formBibliotheque->createView(),
                'bibliothequeDoc'=>$BibliothequeRepository->findAll(),
            ]);
        } */
        public function mieux_produire(){
            $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('mieux_produire/mieux_produire.html.twig', [
            'controller_name' => 'MieuxProduireController',
            'form' => $form->createView()
        ]);
    }
}

