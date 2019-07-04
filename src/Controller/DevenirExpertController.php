<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\DevenirExpert;
use App\Form\RegistrationType;
use App\Form\DevenirExpertType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevenirExpertController extends AbstractController
{
    /**
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
        ]);
    }
}