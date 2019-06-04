<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\RecapElevage;
use App\Form\RecapElevageType;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

=======
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER")
 */
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
class RecapElevageController extends AbstractController
{
    /**
         * @Route("/recap_elevage", name ="recap_elevage")
         */
        public function recap_elevage(){
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
