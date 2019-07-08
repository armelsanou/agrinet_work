<?php

namespace App\Controller;

use App\Entity\BibliothequeRecherche;
use App\Form\BibliothequeRechercheType;
use App\Repository\BibliothequeRechercheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bibliotheque/recherche")
 */
class BibliothequeRechercheController extends AbstractController
{
    /**
     * @Route("/", name="bibliotheque_recherche_index", methods={"GET"})
     */
    public function index(BibliothequeRechercheRepository $bibliothequeRechercheRepository): Response
    {
        return $this->render('bibliotheque_recherche/index.html.twig', [
            'bibliotheque_recherches' => $bibliothequeRechercheRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bibliotheque_recherche_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bibliothequeRecherche = new BibliothequeRecherche();
        $form = $this->createForm(BibliothequeRechercheType::class, $bibliothequeRecherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bibliothequeRecherche);
            $entityManager->flush();

            return $this->redirectToRoute('add_bibliotheque_recherche');
        }

        return $this->render('bibliotheque_recherche/new.html.twig', [
            'bibliotheque_recherche' => $bibliothequeRecherche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bibliotheque_recherche_show", methods={"GET"})
     */
    public function show(BibliothequeRecherche $bibliothequeRecherche): Response
    {
        return $this->render('bibliotheque_recherche/show.html.twig', [
            'bibliotheque_recherche' => $bibliothequeRecherche,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bibliotheque_recherche_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BibliothequeRecherche $bibliothequeRecherche): Response
    {
        $form = $this->createForm(BibliothequeRechercheType::class, $bibliothequeRecherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('add_bibliotheque_recherche', [
                'id' => $bibliothequeRecherche->getId(),
            ]);
        }

        return $this->render('bibliotheque_recherche/edit.html.twig', [
            'bibliotheque_recherche' => $bibliothequeRecherche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bibliotheque_recherche_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BibliothequeRecherche $bibliothequeRecherche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bibliothequeRecherche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bibliothequeRecherche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('add_bibliotheque_recherche');
    }
}
