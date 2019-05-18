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

        /**
         * @Route("/mieux_produire", name ="mieux_produire")
         */
        public function mieux_produire(){
            return
            $this->render('security/mieux_produire.html.twig');
        }

         /**
         * @Route("/formation_expertise", name ="formation_expertise")
         */
        public function formation_expertise(){
            return
            $this->render('security/formation_expertise.html.twig');
        }

          /**
         * @Route("/agri_impact", name ="agri_impact")
         */
        public function agri_impact(){
            return
            $this->render('security/agri_impact.html.twig');
        }

         /**
         * @Route("/bibliotheque_agricole", name ="bibliotheque_agricole")
         */
        public function bibliotheque_agricole(){
            return
            $this->render('security/bibliotheque_agricole.html.twig');
        }

        /**
         * @Route("/contact", name ="contactez_nous")
         */
        public function contactez_nous(){
            return
            $this->render('security/contact.html.twig');
        }

        /**
         * @Route("/a_propos", name ="a_propos_de_nous")
         */
        public function a_propos(){
            return
            $this->render('security/a_propos.html.twig');
        }

          /**
         * @Route("/recap_culture", name ="recap_culture")
         */
        public function recap_culture(){
            return
            $this->render('security/recap_culture.html.twig');
        }

         /**
         * @Route("/recap_elevage", name ="recap_elevage")
         */
        public function recap_elevage(){
            return
            $this->render('security/recap_elevage.html.twig');
        }
         /**
         * @Route("/phytopharmacie", name ="phytopharmacie")
         */
        public function phytopharmacie(){
            return
            $this->render('security/phytopharmacie.html.twig');
        }
    }

