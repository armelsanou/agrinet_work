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
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
             $this->render('security/home.html.twig', [
                'form' => $form->createView()
            ]);
        }
        
        /**
         * @Route("/welcome", name ="security_welcome")
         */
        public function welcome(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
             $this->render('security/welcom.html.twig', [
                'form' => $form->createView()
            ]);
        }

        
        /**
         * @Route("/deconnexion", name ="security_logout")
         */
        public function logout(){
           
        }

        /**
         * @Route("/mieux_produire", name ="mieux_produire")
         */
        public function mieux_produire(){
            $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/mieux_produire.html.twig', [
                'form' => $form->createView()
            ]);
        }

         /**
         * @Route("/formation_expertise", name ="formation_expertise")
         */
        public function formation_expertise(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/formation_expertise.html.twig', [
                'form' => $form->createView()
            ]);
        }

          /**
         * @Route("/agri_impact", name ="agri_impact")
         */
        public function agri_impact(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/agri_impact.html.twig', [
                'form' => $form->createView()
            ]);
        }

         /**
         * @Route("/bibliotheque_agricole", name ="bibliotheque_agricole")
         */
        public function bibliotheque_agricole(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/bibliotheque_agricole.html.twig', [
                'form' => $form->createView()
            ]);
        }

        /**
         * @Route("/contact", name ="contactez_nous")
         */
        public function contactez_nous(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/contact.html.twig', [
                'form' => $form->createView()
            ]);
        }

        /**
         * @Route("/a_propos", name ="a_propos_de_nous")
         */
        public function a_propos(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/a_propos.html.twig', [
                'form' => $form->createView()
            ]);
        }

    }

