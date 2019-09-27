<?php

namespace App\Controller;

use App\Entity\MontageProjet;
use App\Form\MontageProjetType;
use App\Repository\MontageProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/montage/projet")
 */
class MontageProjetController extends AbstractController
{
    /**
     * @Route("/", name="montage_projet_index", methods={"GET"})
     */
    public function index(MontageProjetRepository $montageProjetRepository): Response
    {
        return $this->render('montage_projet/index.html.twig', [
            'montage_projets' => $montageProjetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="montage_projet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $montageProjet = new MontageProjet();
        $form = $this->createForm(MontageProjetType::class, $montageProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($montageProjet);
            $entityManager->flush();

            return $this->redirectToRoute('montage_projet_index');
        }

        return $this->render('montage_projet/new.html.twig', [
            'montage_projet' => $montageProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montage_projet_show", methods={"GET"})
     */
    public function show(MontageProjet $montageProjet): Response
    {
        return $this->render('montage_projet/show.html.twig', [
            'montage_projet' => $montageProjet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="montage_projet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MontageProjet $montageProjet): Response
    {
        $form = $this->createForm(MontageProjetType::class, $montageProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('montage_projet_index', [
                'id' => $montageProjet->getId(),
            ]);
        }

        return $this->render('montage_projet/edit.html.twig', [
            'montage_projet' => $montageProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montage_projet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MontageProjet $montageProjet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$montageProjet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($montageProjet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('montage_projet_index');
    }
}
