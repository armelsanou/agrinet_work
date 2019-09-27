<?php

namespace App\Controller;

use App\Entity\GestionDuSol;
use App\Form\GestionDuSolType;
use App\Repository\GestionDuSolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gestion/du/sol")
 */
class GestionssDuSolController extends AbstractController
{
    /**
     * @Route("/", name="gestion_du_sol_index", methods={"GET"})
     */
    public function index(GestionDuSolRepository $gestionDuSolRepository): Response
    {
        return $this->render('gestion_du_sol/index.html.twig', [
            'gestion_du_sols' => $gestionDuSolRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gestion_du_sol_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gestionDuSol = new GestionDuSol();
        $form = $this->createForm(GestionDuSolType::class, $gestionDuSol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gestionDuSol);
            $entityManager->flush();

            return $this->redirectToRoute('gestion_du_sol_index');
        }

        return $this->render('gestion_du_sol/new.html.twig', [
            'gestion_du_sol' => $gestionDuSol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gestion_du_sol_show", methods={"GET"})
     */
    public function show(GestionDuSol $gestionDuSol): Response
    {
        return $this->render('gestion_du_sol/show.html.twig', [
            'gestion_du_sol' => $gestionDuSol,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gestion_du_sol_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GestionDuSol $gestionDuSol): Response
    {
        $form = $this->createForm(GestionDuSolType::class, $gestionDuSol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gestion_du_sol_index', [
                'id' => $gestionDuSol->getId(),
            ]);
        }

        return $this->render('gestion_du_sol/edit.html.twig', [
            'gestion_du_sol' => $gestionDuSol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gestion_du_sol_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GestionDuSol $gestionDuSol): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gestionDuSol->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gestionDuSol);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gestion_du_sol_index');
    }
}
