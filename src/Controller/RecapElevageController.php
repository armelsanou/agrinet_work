<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\RecapElevage;
use App\Form\RecapElevageType;
use App\Form\RegistrationType;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\SecurityController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\ActualiteRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @IsGranted("ROLE_USER")
 */
class RecapElevageController extends AbstractController
{
    /**
         * @Route("/recap_elevage", name ="recap_elevage")
         */
        public function recap_elevage(Request $request, 
                          ActualiteRepository $listActualiteRepository,
                          UserPasswordEncoderInterface $encoder, 
                          ObjectManager $manager, 
                          SecurityController $injector){
            //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
            //registration qui se trouve dans SecurityController
            //afin de pouvoir créer un compte dans cette page
            $injector->registration($request,$listActualiteRepository,$manager,$encoder);

            $user = new User();
  
             $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('recap_elevage/recap_elevage.html.twig', [
            'controller_name' => 'RecapElevageController',
            'form' => $form->createView()
        ]);
    }

    /* public function createRecapElevage(RecapElevage $recapElevage, Request $request,  ObjectManager $manager, User $user):Response
    {
        
        $formRecap = $this->createForm(RecapElevageType::class, $recapElevage);
        $userConnected = $this->getUser();
        $id = $userConnected ->getId();
        $formRecap->handleRequest($request);

        if($formRecap->isSubmitted() && $formRecap->isValid()){
            $user = getUser();
            $recapElevage->setIdUser($user);
                $manager->persist($recapElevage);
                $manager->flush();
                $this->addFlash('success', 'Nouveau élevage crée avec succès.');
        }
        dump($recapElevage);
        dump($user);
        return $this->render('recap_elevage/recap_elevage.html.twig', [
            'controller_name' => 'RecapElevageController',
        ]);
    } */
}
