<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Controller\SecurityController;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Repository\SuiviAgriImgRepository;

class MieuxProduireController extends AbstractController
{
        /**
         * @Route("/mieux_produire", name ="mieux_produire")
         */
        public function mieux_produire(Request $request, 
                                            ActualiteRepository $listActualiteRepository,
                                            UserPasswordEncoderInterface $encoder, 
                                            ObjectManager $manager,
                                            SuiviAgriImgRepository $suiviAgriImgRepository, 
                                            SecurityController $injector){
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);
            $user = new User();
  
            $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('mieux_produire/mieux_produire.html.twig', [
            'controller_name' => 'MieuxProduireController',
            'form' => $form->createView(),
            'suivi_agri_imgs' => $suiviAgriImgRepository->findAll(),
        ]);
    }
}
