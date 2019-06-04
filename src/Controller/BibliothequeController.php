<?php

namespace App\Controller;

use App\Entity\User;
<<<<<<< HEAD
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
=======
use App\Entity\Bibliotheque;
use App\Form\BibliothequeType;
use App\Form\RegistrationType;
use App\Repository\BibliothequeRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\BrowserKit\Response;

class BibliothequeController extends AbstractController
{
         /**
         * @Route("/bibliotheque_agricole", name ="bibliotheque_agricole")
         */
        public function bibliotheque_agricole(ObjectManager $manager, BibliothequeRepository $BibliothequeRepository, Request $request){
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
            $user = new User();
            $bibliotheque = new Bibliotheque();

            $formBibliotheque = $this->createForm(BibliothequeType::class,  $bibliotheque);

             $form = $this->createForm(RegistrationType::class, $user);
             $formBibliotheque->handleRequest($request);
             if($formBibliotheque->isSubmitted() && $formBibliotheque->isValid()){
 
<<<<<<< HEAD
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
=======
                $file=$bibliotheque->getName();
                 $fileName= md5(uniqid()).'.'.$file->guessExtension();
                 $file->move($this->getParameter('upload_directoy'), $fileName);
 
                 $bibliotheque->setName($fileName);
               
 
                   $manager->persist($bibliotheque);
                   $manager->flush();
                   $this->addFlash('success', 'Upload reussi.');
 
           return $this->RedirectToRoute('bibliotheque_agricole'); 
 
            
                } 
        return
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
            $this->render('bibliotheque/bibliotheque_agricole.html.twig', [
                'form' => $form->createView(),
                'formBibliotheque' =>$formBibliotheque->createView(),
                'bibliothequeDoc'=>$BibliothequeRepository->findAll(),
            ]);
<<<<<<< HEAD
        } */
        public function mieux_produire(){
            $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('mieux_produire/mieux_produire.html.twig', [
            'controller_name' => 'MieuxProduireController',
            'form' => $form->createView()
        ]);
=======
        
      
    }

        /**
         * @Route("/download", name ="download_document")
         */
    public function downloadAction()
    {
        $response = new Response();
        $d = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $zipName
           );
        
        $response->headers->set('Content-Disposition', $d);
        
        return $response;
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
    }
}

