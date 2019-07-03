<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Actualite;
use App\Form\ActualiteType;
use App\Form\RegistrationType;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Controller\SecurityController;

class ActualiteController extends AbstractController
{
    /**
     * @Route("/actualite", name="actualite", methods={"GET","POST"})
     */
    public function actualite(ObjectManager $manager,
                              ActualiteRepository $listActualiteRepository, 
                              Request $request, 
                              UserPasswordEncoderInterface $encoder,
                              SecurityController $injector ){
        try
        {                        
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);


            $actualite = new Actualite(); 
            $user = new User();
    
                $form = $this->createForm(RegistrationType::class, $user);
                $formActu = $this->createForm(ActualiteType::class, $actualite);
                $formActu->handleRequest($request);
                if($formActu->isSubmitted() && $formActu->isValid()){

                $file=$actualite->getImage();
                    $fileName= md5(uniqid()).'.'.$file->guessExtension();
                    $file->move($this->getParameter('upload_directoy'), $fileName);

                    $actualite->setImage($fileName);
                    $actualite->setCreatedAt(new \DateTime());

                    $manager->persist($actualite);
                    $manager->flush();
                    $this->addFlash('success', 'Votre compte à bien été enregistré.');

                    return $this->redirectToRoute('actualite');
                /*    return $this->RedirectToRoute('security_welcome'); */

            }
            return $this->render('actualite/actualite.html.twig', [
                'controller_name' => 'ActualiteController',
                'all_actualite'=>$listActualiteRepository->findAll(),
                'form' => $form->createView(),
                'formActu' => $formActu->createView(),
            
            ]);
        }catch(Exception $exception){
                $this->addFlash('errorConnexion', 'Please Check your connexion!');
        }
    }

     /**
     * @Route("article/{id}", name="details_article", methods={"GET","POST"})
     */
    public function articleDetails(Actualite $actualiteCurrent,
                                   ActualiteRepository $listActualiteRepository, 
                                   Request $request,
                                   UserPasswordEncoderInterface $encoder,
                                   SecurityController $injector,
                                   ObjectManager $manager):Response{
        try
        {         
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);

            $actualite = new Actualite(); 
            $user = new User();
            $form = $this->createForm(RegistrationType::class, $user);
            $formActu = $this->createForm(ActualiteType::class, $actualite);
            $formActu->handleRequest($request);
        
            return $this->render('actualite/actualiteDetails.html.twig', [
                'controller_name' => 'ActualiteController',
                'actualite'=>$actualiteCurrent,
                'form' => $form->createView(),
                'listeActu'=>$listActualiteRepository->findAll(),
                'formActu' => $formActu->createView(),
            ]);
        }catch(Exception $exception){
                $this->addFlash('errorConnexion', 'Please Check your connexion!');
        }
    }
    
}
