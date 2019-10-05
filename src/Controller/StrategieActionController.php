<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\SecurityController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\ActualiteRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Repository\StrategieActionImgRepository;
class StrategieActionController extends AbstractController
{
    /**
     * @Route("/strategie/action", name="strategie_action")
     */
    public function index(Request $request, 
                          ActualiteRepository $listActualiteRepository,
                          UserPasswordEncoderInterface $encoder, 
                          StrategieActionImgRepository $strategieActionImgRepository,
                          ObjectManager $manager, 
                          SecurityController $injector){
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);

          $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('strategie_action/index.html.twig', [
            'controller_name' => 'StrategieActionController',
            'strategie_action_imgs' => $strategieActionImgRepository->findAll(),
                'form' => $form->createView()
        ]);
    }
}
