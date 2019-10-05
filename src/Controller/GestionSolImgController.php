<?php

namespace App\Controller;

use App\Entity\GestionSolImg;
use App\Form\GestionSolImgType;
use App\Repository\GestionSolImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gestion/sol/img")
 */
class GestionSolImgController extends AbstractController
{
    /**
     * @Route("/", name="gestion_sol_img_index", methods={"GET"})
     */
    public function index(GestionSolImgRepository $gestionSolImgRepository): Response
    {
        return $this->render('gestion_sol_img/index.html.twig', [
            'gestion_sol_imgs' => $gestionSolImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gestion_sol_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gestionSolImg = new GestionSolImg();
        $form = $this->createForm(GestionSolImgType::class, $gestionSolImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gestionSolImg);
            $entityManager->flush();

            return $this->redirectToRoute('gestion_sol_img_index');
        }

        return $this->render('gestion_sol_img/new.html.twig', [
            'gestion_sol_img' => $gestionSolImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gestion_sol_img_show", methods={"GET"})
     */
    public function show(GestionSolImg $gestionSolImg): Response
    {
        return $this->render('gestion_sol_img/show.html.twig', [
            'gestion_sol_img' => $gestionSolImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gestion_sol_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GestionSolImg $gestionSolImg): Response
    {
        $form = $this->createForm(GestionSolImgType::class, $gestionSolImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gestion_sol_img_index', [
                'id' => $gestionSolImg->getId(),
            ]);
        }

        return $this->render('gestion_sol_img/edit.html.twig', [
            'gestion_sol_img' => $gestionSolImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gestion_sol_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GestionSolImg $gestionSolImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gestionSolImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gestionSolImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gestion_sol_img_index');
    }
}
