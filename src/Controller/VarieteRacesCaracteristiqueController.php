<?php

namespace App\Controller;

use App\Entity\VarieteRacesCaracteristique;
use App\Form\VarieteRacesCaracteristiqueType;
use App\Repository\VarieteRacesCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/variete/races/caracteristique")
 */
class VarieteRacesCaracteristiqueController extends AbstractController
{
    /**
     * @Route("/", name="variete_races_caracteristique_index", methods={"GET"})
     */
    public function index(VarieteRacesCaracteristiqueRepository $varieteRacesCaracteristiqueRepository): Response
    {
        return $this->render('variete_races_caracteristique/index.html.twig', [
            'variete_races_caracteristiques' => $varieteRacesCaracteristiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="variete_races_caracteristique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $varieteRacesCaracteristique = new VarieteRacesCaracteristique();
        $form = $this->createForm(VarieteRacesCaracteristiqueType::class, $varieteRacesCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($varieteRacesCaracteristique);
            $entityManager->flush();

            return $this->redirectToRoute('add_variete');
        }

        return $this->render('variete_races_caracteristique/new.html.twig', [
            'variete_races_caracteristique' => $varieteRacesCaracteristique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="variete_races_caracteristique_show", methods={"GET"})
     */
    public function show(VarieteRacesCaracteristique $varieteRacesCaracteristique): Response
    {
        return $this->render('variete_races_caracteristique/show.html.twig', [
            'variete_races_caracteristique' => $varieteRacesCaracteristique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="variete_races_caracteristique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VarieteRacesCaracteristique $varieteRacesCaracteristique): Response
    {
        $form = $this->createForm(VarieteRacesCaracteristiqueType::class, $varieteRacesCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('add_variete', [
                'id' => $varieteRacesCaracteristique->getId(),
            ]);
        }

        return $this->render('variete_races_caracteristique/edit.html.twig', [
            'variete_races_caracteristique' => $varieteRacesCaracteristique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="variete_races_caracteristique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, VarieteRacesCaracteristique $varieteRacesCaracteristique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$varieteRacesCaracteristique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($varieteRacesCaracteristique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('add_variete');
    }
}
