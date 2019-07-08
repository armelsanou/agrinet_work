<?php

namespace App\Controller;

use App\Repository\AgriFinanceCategorieRepository;
use App\Repository\AgriFinanceStructureRepository;
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
    public function index(ObjectManager $manager, Request $request,AgriFinanceStructureRepository $agriFinanceStructureRepository,AgriFinanceRepository $agriFinanceRepository,AgriFinanceCategorieRepository $agriFinanceCategorieRepository)
    {
        $user = new User();
        $agriFinance=new AgriFinance();

         $form = $this->createForm(RegistrationType::class, $user);
         $formAgri = $this->createForm(AgriFinanceType::class, $agriFinance);
         $formAgri->handleRequest($request);
         $value= $request->get("categorie");
        $value2= $request->get("structure");
        dump($value);
        $rechercheByCategorie=$agriFinanceStructureRepository->findByCategorie($value);
        dump($rechercheByCategorie);

        $rechercheByStructure=$agriFinanceCategorieRepository->findByStructure($value2);
        dump($rechercheByStructure);
         $resultCategorie = $agriFinanceRepository->findByCategorie( $value);
        
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
            'getCat'=>$value,
            'getStru'=>$value2,
            'agri_finance_categories' => $agriFinanceCategorieRepository->findAll(),
            'agri_finance_structures' => $agriFinanceStructureRepository->findAll(),
            'rechercheByCategorie' => $rechercheByCategorie,
            'rechercheByStructure' => $rechercheByStructure,
        ]);
    }
}
