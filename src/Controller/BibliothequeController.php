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
                   $this->addFlash('success', 'Upload reussi.');
 
           return $this->RedirectToRoute('bibliotheque_agricole'); 
 
            
                } 
        return
            $this->render('bibliotheque/bibliotheque_agricole.html.twig', [
                'form' => $form->createView(),
                'formBibliotheque' =>$formBibliotheque->createView(),
                'bibliothequeDoc'=>$BibliothequeRepository->findAll(),
            ]);
        
      
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
    }
}

