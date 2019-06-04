<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Actualite;
<<<<<<< HEAD
use App\Entity\RecapElevage;
use App\Form\RegistrationType;

use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmacieType;
use App\Repository\ActualiteRepository;
=======
use App\Entity\Bibliotheque;
use App\Entity\RecapElevage;

use App\Form\BibliothequeType;
use App\Form\RegistrationType;
use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmacieType;
use App\Repository\ActualiteRepository;
use App\Repository\BibliothequeRepository;
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
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
         $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
              $hash = $encoder->encodePassword($user, $user->getPassword());
              $user->setPassword($hash);
              $user->setRoles("ROLE_USER");  
                $manager->persist($user);
                $manager->flush();
                
                $this->addFlash('success', 'Votre compte à bien été enregistré.');
             /*    return $this->RedirectToRoute('security_welcome'); */
        }
<<<<<<< HEAD
=======
        

>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
        return $this->render('home/home.html.twig', [
            
            'form' => $form->createView(),
            'listeActu'=>$listActualiteRepository->findAll()
        ]);
     }
        /**
         * @Route("/login", name ="security_login" , methods={"GET", "POST"})
         */
        public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
        {
            $session = $request->getSession();
            if (!$session->has('fisrt_connexion')) $session->set('fisrt_connexion', array());
            $parametres = $session->get('fisrt_connexion');

            if($this->getUser() !== null){
                $this->get('session')->getFlashBag()->add('success', $this->getUser()->getUsername().',Bienvenue sur agrinet!');
                $response = new RedirectResponse($this->generateUrl('welcome'));
                return $response;
            }

            $user = new User();

            $form = $this->createForm(RegistrationType::class, $user);
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();
            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();
            return
             $this->redirectToRoute('/' , [
                'last_username' => $lastUsername,
                'error'         => $error,
                'form' => $form->createView()
            ]);
            $userConnected = $this->getUser();
            $id = $userConnected ->getId();
            dump($userConnected);
            dump($id);
        }
        
        
        /**
         * @Route("/deconnexion", name ="security_logout")
         */
        public function logout(){
           
        }


<<<<<<< HEAD
    //Gestion des tableaux de l'élévage
   

=======
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
    }

