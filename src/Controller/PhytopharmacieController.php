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

             for ($var=0; $var <5 ; $var++) { 
                $var =$var;
             }
            
             $phytopharmacie
             ->setCulture($request->query->get('culture'))
             ->setEnemie($request->query->get('enemie'))
             ->setNomCommercial($request->query->get('nom_commercial'))
             ->setSociete($request->query->get('societe'))
             ->setMatiereActive($request->query->get('matiere_active'))
             ->setClasse($request->query->get('classe'))
             ;
            
             $resultCulture = $phytopharmarcieRepository->findByCulture($phytopharmacie->getCulture());
             $resultEnemie = $phytopharmarcieRepository->findByEnemie($phytopharmacie->getEnemie());
             $resultNomCommercial = $phytopharmarcieRepository->findByNomCommercial($phytopharmacie->getNomCommercial());
             $resultSociete = $phytopharmarcieRepository->findBySociete($phytopharmacie->getSociete());
             $resultMatiereActive = $phytopharmarcieRepository->findByMatiereActive($phytopharmacie->getMatiereActive());
             $resultClasse = $phytopharmarcieRepository->findByClasse($phytopharmacie->getClasse());
            
            return
            $this->render('security/phytopharmacie.html.twig'
            , [
                'controller_name' => 'PhytopharmacieController',
                'form' => $form->createView(),
                'formulaire' => $formulaire->createView(),
                'curent'=>$phytopharmacie,
                'listePhyto' =>  $phytopharmarcieRepository->findAll(),
                'resultCulture' => $resultCulture,
                'resultEnemie' => $resultEnemie,
                'resultNomCommercial' => $resultNomCommercial,
                'resultSociete' => $resultSociete,
                'resultMatiereActive' => $resultMatiereActive,
                'resultClasse' => $resultClasse,
                'var' => $var

            ]);
    }



    

}
