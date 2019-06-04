<?php

namespace App\Controller;

<<<<<<< HEAD
use App\Entity\User;
use App\Form\RegistrationType;
=======

use App\Entity\User;
use App\Entity\DevenirExpert;
use App\Form\RegistrationType;
use App\Form\DevenirExpertType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevenirExpertController extends AbstractController
{
    /**
<<<<<<< HEAD
         * @Route("/devenir_expert", name ="devenir_expert")
         */
        public function devenir_expert(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('devenir_expert/devenir_expert.html.twig', [
            'controller_name' => 'DevenirExpertController',
            'form' => $form->createView()
=======
         * @Route("/devenir_expert", name ="devenir_expert", methods={"GET", "POST"})
         */
        public function devenir_expert(Request $request, ObjectManager $manager){
            $user = new User();
            $devenirExpert = new DevenirExpert();
            $FormDevenirExpert = $this->createForm(DevenirExpertType::class, $devenirExpert);

            $FormDevenirExpert->handleRequest($request);
            if($FormDevenirExpert->isSubmitted() && $FormDevenirExpert->isValid()){
          
                 $manager->persist($devenirExpert);
                 $manager->flush();
                 $this->addFlash('success', 'bien enregistré.');
               return $this->RedirectToRoute('devenir_expert'); 
         }
       
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('devenir_expert/devenir_expert.html.twig', [
            'controller_name' => 'DevenirExpertController',
            'form' => $form->createView(),
            'FormDevenirExpert' =>$FormDevenirExpert->createView()
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
        ]);
    }
}
