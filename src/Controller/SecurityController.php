<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Actualite;
use App\Entity\Bibliotheque;
use App\Entity\RecapElevage;

use App\Form\BibliothequeType;
use App\Form\RegistrationType;
use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmacieType;
use App\Repository\ActualiteRepository;
use App\Repository\BibliothequeRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration", methods={"GET", "POST"})
     */
     public function registration(Request $request, ActualiteRepository $listActualiteRepository, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
        
        try
        {
             $user = new User();
            $form = $this->createForm(RegistrationType::class, $user);
            $form->handleRequest($request);

<<<<<<< HEAD
        if($form->isSubmitted() && $form->isValid()){
              $hash = $encoder->encodePassword($user, $user->getPassword());
              $user->setPassword($hash);
              $user->setRoles("ROLE_USER");  
                $manager->persist($user);
                $manager->flush();
                
                
                $this->addFlash('success', 'Votre compte à bien été enregistré.');
                return $this->RedirectToRoute('security_welcome'); 
        }
       
        

        return $this->render('home/home.html.twig', [
            
            'form' => $form->createView(),
          
            'listeActu'=>$listActualiteRepository->findAll()
        ]);
=======
            if($form->isSubmitted() && $form->isValid()){
                $hash = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($hash);
                $user->setRoles("ROLE_USER");  
                    $manager->persist($user);
                    $manager->flush();
                    
                    $this->addFlash('success', 'Votre compte à bien été enregistré.');
                    return $this->RedirectToRoute('security_welcome'); 
        }
            return $this->render('home/home.html.twig', [
                
                'form' => $form->createView(),
                'listeActu'=>$listActualiteRepository->findAll()
            ]);

        }catch(Exception $exception){
                $this->addFlash('accountFail', 'identifiant ou mot de passe incorrect!');
            }
           
>>>>>>> 39e297d024fff722f4799323eb0bafc250111bce
     }
        /**
         * @Route("/login", name ="security_login" , methods={"GET", "POST"})
         */
        public function login(AuthenticationUtils $authenticationUtils, Request $request)
        {
            try
            {
                    $session = $request->getSession();
                if (!$session->has('fisrt_connexion')) $session->set('fisrt_connexion', array());
                $parametres = $session->get('fisrt_connexion');

                if($this->getUser() !== null){
                    $this->get('session')->getFlashBag()->add('success', $this->getUser()->getUsername().',Bienvenue sur agrinet!');
                    $response = new RedirectResponse($this->generateUrl('security_welcome'));
                    return $response;
                }

                $user = new User();

                $form = $this->createForm(RegistrationType::class, $user);
                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();
                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();
                $userConnected = $this->getUser();
                dump($lastUsername);
                var_dump($userConnected);
                return
                $this->redirectToRoute('security_welcome' , [
                    'last_username' => $lastUsername,
                    'error'         => $error,
                    'form' => $form->createView()
                ]);

            }catch(Exception $exception){
                $this->addFlash('badConnexion', 'identifiant ou mot de passe incorrect!');
                 $this->redirectToRoute('security_welcome' , [
                    'last_username' => $lastUsername,
                    'error'         => $error,
                    'form' => $form->createView()
                ]);
            }
            
        }
        
        
        /**
         * @Route("/deconnexion", name ="security_logout")
         */
        public function logout(){
           
        }


    }

