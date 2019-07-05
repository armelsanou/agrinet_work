<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\AgriFinance;
use App\Form\AgriFinanceType;
use App\Form\RegistrationType;
use App\Repository\AgriFinanceRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;


class AgriFinanceController extends AbstractController
{
    /**
     * @Route("/agri/finance", name="agri_finance")
     */
    public function index(ObjectManager $manager, Request $request,AgriFinanceRepository $agriFinanceRepository)
    {
        $user = new User();
        $agriFinance=new AgriFinance();
      
         $form = $this->createForm(RegistrationType::class, $user);
         $formAgri = $this->createForm(AgriFinanceType::class, $agriFinance);
         $formAgri->handleRequest($request);
         $test= $request->get("categorie");
        
         $resultCategorie = $agriFinanceRepository->findByCategorie($test);
        
         if($formAgri->isSubmitted() && $formAgri->isValid()){
            
                   $manager->persist($agriFinance);
                   $manager->flush();
                   $this->addFlash('success', 'bien enregistré.');
                 return $this->RedirectToRoute('agri_finance'); 
           }
           
        return $this->render('agri_finance/index.html.twig', [
            'controller_name' => 'AgriFinanceController',
            'form' => $form->createView(),
            'formAgri'=> $formAgri->createView(),
            'liste' =>  $agriFinanceRepository->findAll(),
            'resultCategorie'  =>$resultCategorie,
            'getCat'=>$test,
        ]);
    }
}
