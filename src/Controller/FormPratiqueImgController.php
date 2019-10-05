<?php

namespace App\Controller;

use App\Entity\FormPratiqueImg;
use App\Form\FormPratiqueImgType;
use App\Repository\FormPratiqueImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/form/pratique/img")
 */
class FormPratiqueImgController extends AbstractController
{
    /**
     * @Route("/", name="form_pratique_img_index", methods={"GET"})
     */
    public function index(FormPratiqueImgRepository $formPratiqueImgRepository): Response
    {
        return $this->render('form_pratique_img/index.html.twig', [
            'form_pratique_imgs' => $formPratiqueImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="form_pratique_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formPratiqueImg = new FormPratiqueImg();
        $form = $this->createForm(FormPratiqueImgType::class, $formPratiqueImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formPratiqueImg);
            $entityManager->flush();

            return $this->redirectToRoute('form_pratique_img_index');
        }

        return $this->render('form_pratique_img/new.html.twig', [
            'form_pratique_img' => $formPratiqueImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="form_pratique_img_show", methods={"GET"})
     */
    public function show(FormPratiqueImg $formPratiqueImg): Response
    {
        return $this->render('form_pratique_img/show.html.twig', [
            'form_pratique_img' => $formPratiqueImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="form_pratique_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FormPratiqueImg $formPratiqueImg): Response
    {
        $form = $this->createForm(FormPratiqueImgType::class, $formPratiqueImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('form_pratique_img_index', [
                'id' => $formPratiqueImg->getId(),
            ]);
        }

        return $this->render('form_pratique_img/edit.html.twig', [
            'form_pratique_img' => $formPratiqueImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="form_pratique_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FormPratiqueImg $formPratiqueImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formPratiqueImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formPratiqueImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('form_pratique_img_index');
    }
}
