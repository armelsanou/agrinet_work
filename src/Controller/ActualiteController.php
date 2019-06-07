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

class ActualiteController extends AbstractController
{
    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualite(ObjectManager $manager, ActualiteRepository $actualiteRepository, Request $request)
    {
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
            'all_actualite'=>$actualiteRepository->findAll(),
            'form' => $form->createView(),
            'formActu' => $formActu->createView(),
        
        ]);
    }
    
}
