<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Phytopharmarcie;
use App\Form\RegistrationType;
use App\Form\PhytopharmacieType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
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
             // $user->setRoles("ROLE_USER");  
                $manager->persist($user);
                $manager->flush();
                $this->addFlash('success', 'Votre compte à bien été enregistré.');
             /*    return $this->RedirectToRoute('security_welcome'); */
        }
      

        return $this->render('security/home.html.twig', [
            
            'form' => $form->createView()
        ]);
     }
        /**
         * @Route("/login", name ="security_login" , methods={"GET", "POST"})
         */
        public function login(AuthenticationUtils $authenticationUtils): Response
        {
            $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();
            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();
            return
             $this->redirectToRoute('security/home.html.twig' , [
                'last_username' => $lastUsername,
                'error'         => $error,
                'form' => $form->createView()
            ]);
        }
        
        /**
         * @Route("/welcome", name ="security_welcome")
         */
        public function welcome(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
             return
             $this->render('security/home.html.twig', [
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

          /**
         * @Route("/recap_culture", name ="recap_culture")
         */
        public function recap_culture(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/recap_culture.html.twig', [
                'form' => $form->createView()
            ]);
        }

         /**
         * @Route("/recap_elevage", name ="recap_elevage")
         */
        public function recap_elevage(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/recap_elevage.html.twig', [
                'form' => $form->createView()
            ]);
        }
         
        /**
         * @Route("actualite", name="security_actualite")
         */
        public function actualite(){
            $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
           return
            $this->render('security/actualite.html.twig'
            , [
                'form' => $form->createView()
            ]);
        }

        /**
         * @Route("/formation_initiale", name ="formation_initiale")
         */
        public function formation_initiale(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/formation_initiale.html.twig'
            , [
                'form' => $form->createView()
            ]);
        }

         /**
         * @Route("/formation_pratique", name ="formation_pratique")
         */
        public function formation_pratique(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/formation_pratique.html.twig'
            , [
                'form' => $form->createView()
            ]);
        }

                 /**
         * @Route("/montage_projets", name ="montage_projets")
         */
        public function montage_projets(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/montage_projets.html.twig'
            , [
                'form' => $form->createView()
            ]);
        }

                 /**
         * @Route("/gestion_du_sol", name ="gestion_du_sol")
         */
        public function gestion_du_sol(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/gestion_du_sol.html.twig'
            , [
                'form' => $form->createView()
            ]);
        }

                 /**
         * @Route("/vulgarisation_agricole", name ="vulgarisation_agricole")
         */
        public function vulgarisation_agricole(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return
            $this->render('security/vulgarisation_agricole.html.twig'
            , [
                'form' => $form->createView()
            ]);
        }
           
                    /**
         * @Route("/devenir_expert", name ="devenir_expert")
         */
        public function devenir_expert(){
            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
            return

            $this->render('security/devenir_expert.html.twig'

            , [
                'form' => $form->createView()
            ]);
        }
    }

