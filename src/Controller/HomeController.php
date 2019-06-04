<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
<<<<<<< HEAD
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
=======
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8

class HomeController extends AbstractController
{
    /**
<<<<<<< HEAD
     * @Route("/home", name ="security_welcome")
         */
        public function welcome(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
             return
             $this->render('home/home.html.twig', [
                'form' => $form->createView()
            ]);
=======
         * @Route("/", name ="security_welcome")
         */
        public function index(Request $request, ActualiteRepository $listActualiteRepository, ObjectManager $manager,UserPasswordEncoderInterface $encoder){
            $user = new User();
           $form = $this->createForm(RegistrationType::class, $user);
           $form->handleRequest($request);
   
            if($form->isSubmitted() && $form->isValid()){
                 $hash = $encoder->encodePassword($user, $user->getPassword());
                 $user->setPassword($hash);
                 $user->addRole("ROLE_USER");  
                   $manager->persist($user);
                   $manager->flush();
                   $this->addFlash('success', 'Votre compte à bien été enregistré.');
                    return $this->RedirectToRoute('security_welcome'); 
           } 
    
           return $this->render('home/home.html.twig', [
               
               'form' => $form->createView(),
               'listeActu'=>$listActualiteRepository->findAll()
           ]);
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
        }
}
