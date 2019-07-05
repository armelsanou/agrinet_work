<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\DevenirExpert;
use App\Form\RegistrationType;
use App\Repository\ActualiteRepository;
use App\Form\DevenirExpertType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Controller\SecurityController;

class DevenirExpertController extends AbstractController
{
        /**
         * @Route("/devenir_expert", name ="devenir_expert", methods={"GET", "POST"})
         */
        public function devenir_expert(Request $request, 
                                       ActualiteRepository $listActualiteRepository,
                                       UserPasswordEncoderInterface $encoder, 
                                       ObjectManager $manager, 
                                       SecurityController $injector){
           
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);
          
            $user = new User();
            $devenirExpert = new DevenirExpert();
            $FormDevenirExpert = $this->createForm(DevenirExpertType::class, $devenirExpert);

            $FormDevenirExpert->handleRequest($request);
            if($FormDevenirExpert->isSubmitted() && $FormDevenirExpert->isValid()){
                $file=$devenirExpert->getCv();
                $fileName= md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directoy'), $fileName);

                $devenirExpert->setCv($fileName);
              
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
