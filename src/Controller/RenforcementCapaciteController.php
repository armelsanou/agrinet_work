<?php

namespace App\Controller;

use App\Entity\RenforcementCapacite;
use App\Form\RenforcementCapaciteType;
use App\Repository\RenforcementCapaciteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/renforcement/capacite")
 */
class RenforcementCapaciteController extends AbstractController
{
    /**
     * @Route("/", name="renforcement_capacite_index", methods={"GET"})
     */
    public function index(RenforcementCapaciteRepository $renforcementCapaciteRepository): Response
    {
        return $this->render('renforcement_capacite/index.html.twig', [
            'renforcement_capacites' => $renforcementCapaciteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="renforcement_capacite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $renforcementCapacite = new RenforcementCapacite();
        $form = $this->createForm(RenforcementCapaciteType::class, $renforcementCapacite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($renforcementCapacite);
            $entityManager->flush();

            return $this->redirectToRoute('renforcement_capacite_index');
        }

        return $this->render('renforcement_capacite/new.html.twig', [
            'renforcement_capacite' => $renforcementCapacite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="renforcement_capacite_show", methods={"GET"})
     */
    public function show(RenforcementCapacite $renforcementCapacite): Response
    {
        return $this->render('renforcement_capacite/show.html.twig', [
            'renforcement_capacite' => $renforcementCapacite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="renforcement_capacite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RenforcementCapacite $renforcementCapacite): Response
    {
        $form = $this->createForm(RenforcementCapaciteType::class, $renforcementCapacite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('renforcement_capacite_index', [
                'id' => $renforcementCapacite->getId(),
            ]);
        }

        return $this->render('renforcement_capacite/edit.html.twig', [
            'renforcement_capacite' => $renforcementCapacite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="renforcement_capacite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RenforcementCapacite $renforcementCapacite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$renforcementCapacite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($renforcementCapacite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('renforcement_capacite_index');
    }
}
