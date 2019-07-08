<?php

namespace App\Controller;

use App\Entity\AgriFinanceStructure;
use App\Form\AgriFinanceStructureType;
use App\Repository\AgriFinanceStructureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/agri/finance/structure")
 */
class AgriFinanceStructureController extends AbstractController
{
    /**
     * @Route("/", name="agri_finance_structure_index", methods={"GET"})
     */
    public function index(AgriFinanceStructureRepository $agriFinanceStructureRepository): Response
    {
        return $this->render('agri_finance_structure/index.html.twig', [
            'agri_finance_structures' => $agriFinanceStructureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="agri_finance_structure_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $agriFinanceStructure = new AgriFinanceStructure();
        $form = $this->createForm(AgriFinanceStructureType::class, $agriFinanceStructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($agriFinanceStructure);
            $entityManager->flush();

            return $this->redirectToRoute('add_agri_struc');
        }

        return $this->render('agri_finance_structure/new.html.twig', [
            'agri_finance_structure' => $agriFinanceStructure,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agri_finance_structure_show", methods={"GET"})
     */
    public function show(AgriFinanceStructure $agriFinanceStructure): Response
    {
        return $this->render('agri_finance_structure/show.html.twig', [
            'agri_finance_structure' => $agriFinanceStructure,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="agri_finance_structure_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AgriFinanceStructure $agriFinanceStructure): Response
    {
        $form = $this->createForm(AgriFinanceStructureType::class, $agriFinanceStructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('add_agri_struc', [
                'id' => $agriFinanceStructure->getId(),
            ]);
        }

        return $this->render('agri_finance_structure/edit.html.twig', [
            'agri_finance_structure' => $agriFinanceStructure,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agri_finance_structure_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AgriFinanceStructure $agriFinanceStructure): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agriFinanceStructure->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($agriFinanceStructure);
            $entityManager->flush();
        }

        return $this->redirectToRoute('add_agri_struc');
    }
}
