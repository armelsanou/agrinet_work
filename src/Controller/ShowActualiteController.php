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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ShowActualiteController extends AbstractController
{
    /**
     * @Route("/show/actualite/{id}", name="show_actualite")
     */
    public function index($id,ActualiteRepository $actualiteRepository,Request $request, ActualiteRepository $listActualiteRepository, ObjectManager $manager,UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $actualite = new Actualite(); 
        $form = $this->createForm(RegistrationType::class, $user);
        $formActu = $this->createForm(ActualiteType::class, $actualite);
       $actu= $actualiteRepository->find($id);
       
        return $this->render('show_actualite/index.html.twig', [
            'controller_name' => 'ShowActualiteController',
            'form' => $form->createView(),
            'listeActu'=>$listActualiteRepository->findAll(),
            'all_actualite'=>$actualiteRepository->findAll(),
            'actuliteRecupe'=>$actu,
        
           
        ]);
    }

    
}
