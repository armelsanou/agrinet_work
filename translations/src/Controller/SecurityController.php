<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */

     public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
         $user = new User();
  
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
              $hash = $encoder->encodePassword($user, $user->getPassword());
              $user->setPassword($hash);  
                $manager->persist($user);
                $manager->flush();
                return $this->RedirectToRoute('security_welcome');
        }
      

        return $this->render('security/home.html.twig', [
            'form' => $form->createView()
        ]);
     }
        /**
         * @Route("/connexion", name ="security_login")
         */
        public function login(){
            return
             $this->render('security/home.html.twig');
        }
        
        /**
         * @Route("/welcome", name ="security_welcome")
         */
        public function welcome(){
            return
             $this->render('security/welcom.html.twig');
        }

        
        /**
         * @Route("/deconnexion", name ="security_logout")
         */
        public function logout(){
           
        }

    }

