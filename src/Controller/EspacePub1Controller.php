<?php

namespace App\Controller;

use App\Entity\EspacePub1;
use App\Form\EspacePub1Type;
use App\Repository\EspacePub1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/espace/pub1")
 */
class EspacePub1Controller extends AbstractController
{
    /**
     * @Route("/", name="espace_pub1_index", methods={"GET"})
     */
    public function index(EspacePub1Repository $espacePub1Repository): Response
    {
        return $this->render('espace_pub1/index.html.twig', [
            'espace_pub1s' => $espacePub1Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="espace_pub1_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $espacePub1 = new EspacePub1();
        $form = $this->createForm(EspacePub1Type::class, $espacePub1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($espacePub1);
            $entityManager->flush();

            return $this->redirectToRoute('espace_pub1_index');
        }

        return $this->render('espace_pub1/new.html.twig', [
            'espace_pub1' => $espacePub1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_pub1_show", methods={"GET"})
     */
    public function show(EspacePub1 $espacePub1): Response
    {
        return $this->render('espace_pub1/show.html.twig', [
            'espace_pub1' => $espacePub1,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="espace_pub1_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EspacePub1 $espacePub1): Response
    {
        $form = $this->createForm(EspacePub1Type::class, $espacePub1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espace_pub1_index', [
                'id' => $espacePub1->getId(),
            ]);
        }

        return $this->render('espace_pub1/edit.html.twig', [
            'espace_pub1' => $espacePub1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="espace_pub1_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EspacePub1 $espacePub1): Response
    {
        if ($this->isCsrfTokenValid('delete'.$espacePub1->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($espacePub1);
            $entityManager->flush();
        }

        return $this->redirectToRoute('espace_pub1_index');
    }
}
