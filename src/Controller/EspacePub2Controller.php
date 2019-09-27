<?php

namespace App\Controller;

use App\Entity\EspacePub2;
use App\Form\EspacePub2Type;
use App\Repository\EspacePub2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/espace/pub2")
 */
class EspacePub2Controller extends AbstractController
{
    /**
     * @Route("/", name="espace_pub2_index", methods={"GET"})
     */
    public function index(EspacePub2Repository $espacePub2Repository): Response
    {
        return $this->render('espace_pub2/index.html.twig', [
            'espace_pub2s' => $espacePub2Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="espace_pub2_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $espacePub2 = new EspacePub2();
        $form = $this->createForm(EspacePub2Type::class, $espacePub2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($espacePub2);
            $entityManager->flush();

            return $this->redirectToRoute('espace_pub2_index');
        }

        return $this->render('espace_pub2/new.html.twig', [
            'espace_pub2' => $espacePub2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_pub2_show", methods={"GET"})
     */
    public function show(EspacePub2 $espacePub2): Response
    {
        return $this->render('espace_pub2/show.html.twig', [
            'espace_pub2' => $espacePub2,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="espace_pub2_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EspacePub2 $espacePub2): Response
    {
        $form = $this->createForm(EspacePub2Type::class, $espacePub2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espace_pub2_index', [
                'id' => $espacePub2->getId(),
            ]);
        }

        return $this->render('espace_pub2/edit.html.twig', [
            'espace_pub2' => $espacePub2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_pub2_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EspacePub2 $espacePub2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$espacePub2->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($espacePub2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('espace_pub2_index');
    }
}
