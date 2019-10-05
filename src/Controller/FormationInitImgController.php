<?php

namespace App\Controller;

use App\Entity\FormationInitImg;
use App\Form\FormationInitImgType;
use App\Repository\FormationInitImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/formation/init/img")
 */
class FormationInitImgController extends AbstractController
{
    /**
     * @Route("/", name="formation_init_img_index", methods={"GET"})
     */
    public function index(FormationInitImgRepository $formationInitImgRepository): Response
    {
        return $this->render('formation_init_img/index.html.twig', [
            'formation_init_imgs' => $formationInitImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="formation_init_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formationInitImg = new FormationInitImg();
        $form = $this->createForm(FormationInitImgType::class, $formationInitImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formationInitImg);
            $entityManager->flush();

            return $this->redirectToRoute('formation_init_img_index');
        }

        return $this->render('formation_init_img/new.html.twig', [
            'formation_init_img' => $formationInitImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formation_init_img_show", methods={"GET"})
     */
    public function show(FormationInitImg $formationInitImg): Response
    {
        return $this->render('formation_init_img/show.html.twig', [
            'formation_init_img' => $formationInitImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="formation_init_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FormationInitImg $formationInitImg): Response
    {
        $form = $this->createForm(FormationInitImgType::class, $formationInitImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formation_init_img_index', [
                'id' => $formationInitImg->getId(),
            ]);
        }

        return $this->render('formation_init_img/edit.html.twig', [
            'formation_init_img' => $formationInitImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formation_init_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FormationInitImg $formationInitImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formationInitImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formationInitImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('formation_init_img_index');
    }
}
