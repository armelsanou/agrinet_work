<?php

namespace App\Controller;

use App\Entity\AgriFinanceCategorie;
use App\Form\AgriFinanceCategorieType;
use App\Repository\AgriFinanceCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/agri/finance/categorie")
 */
class AgriFinanceCategorieController extends AbstractController
{
    /**
     * @Route("/", name="agri_finance_categorie_index", methods={"GET"})
     */
    public function index(AgriFinanceCategorieRepository $agriFinanceCategorieRepository): Response
    {
        return $this->render('agri_finance_categorie/index.html.twig', [
            'agri_finance_categories' => $agriFinanceCategorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="agri_finance_categorie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $agriFinanceCategorie = new AgriFinanceCategorie();
        $form = $this->createForm(AgriFinanceCategorieType::class, $agriFinanceCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($agriFinanceCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('agri_finance_categorie_index');
        }

        return $this->render('agri_finance_categorie/new.html.twig', [
            'agri_finance_categorie' => $agriFinanceCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agri_finance_categorie_show", methods={"GET"})
     */
    public function show(AgriFinanceCategorie $agriFinanceCategorie): Response
    {
        return $this->render('agri_finance_categorie/show.html.twig', [
            'agri_finance_categorie' => $agriFinanceCategorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="agri_finance_categorie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AgriFinanceCategorie $agriFinanceCategorie): Response
    {
        $form = $this->createForm(AgriFinanceCategorieType::class, $agriFinanceCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('add_agri', [
                'id' => $agriFinanceCategorie->getId(),
            ]);
        }

        return $this->render('agri_finance_categorie/edit.html.twig', [
            'agri_finance_categorie' => $agriFinanceCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agri_finance_categorie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AgriFinanceCategorie $agriFinanceCategorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agriFinanceCategorie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($agriFinanceCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('add_agri');
    }
}
