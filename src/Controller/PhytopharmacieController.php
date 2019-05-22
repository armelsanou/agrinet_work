<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmacieType;

use App\Repository\PhytopharmarcieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PhytopharmacieController extends AbstractController
{

  
    
    /**
         * @Route("/phytopharmacie", name ="phytopharmacie")
         */
        public function phytopharmacie(ObjectManager $manager, PhytopharmarcieRepository $phytopharmarcieRepository, Request $request): Response{
            $user = new User();
            $phytopharmacie = new Phytopharmarcie();
            
             $form = $this->createForm(RegistrationType::class, $user);

             $formulaire = $this->createForm(PhytopharmacieType::class, $phytopharmacie);
             
             $culture=$request->query->get('culture');
             $enemie=$request->query->get('enemie');
             $nom_commercial=$request->query->get('nom_commercial');
             $societe=$request->query->get('societe');
          
             
             $phytopharmacie
             ->setCulture($culture)
             ->setEnemie($enemie)
             ->setNomCommercial($nom_commercial)
             ->setSociete($societe)
             ;
             dump($culture);
             dump($societe);
          
             dump($phytopharmacie);
             $result = $phytopharmarcieRepository->findBySociete($societe);
            return
            $this->render('security/phytopharmacie.html.twig'
            , [
                'controller_name' => 'PhytopharmacieController',
                'form' => $form->createView(),
                'formulaire' => $formulaire->createView(),
                'curent'=>$phytopharmacie,
                'listePhyto' =>  $phytopharmarcieRepository->findAll(),
                'culture' =>$culture,
                'result' =>$result
            ]);
    }



    

}
