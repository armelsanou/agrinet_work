<?php

namespace App\Controller;

use App\Entity\FormExperImg;
use App\Form\FormExperImgType;
use App\Repository\FormExperImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/form/exper/img")
 */
class FormExperImgController extends AbstractController
{
    /**
     * @Route("/", name="form_exper_img_index", methods={"GET"})
     */
    public function index(FormExperImgRepository $formExperImgRepository): Response
    {
        return $this->render('form_exper_img/index.html.twig', [
            'form_exper_imgs' => $formExperImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="form_exper_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formExperImg = new FormExperImg();
        $form = $this->createForm(FormExperImgType::class, $formExperImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formExperImg);
            $entityManager->flush();

            return $this->redirectToRoute('form_exper_img_index');
        }

        return $this->render('form_exper_img/new.html.twig', [
            'form_exper_img' => $formExperImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="form_exper_img_show", methods={"GET"})
     */
    public function show(FormExperImg $formExperImg): Response
    {
        return $this->render('form_exper_img/show.html.twig', [
            'form_exper_img' => $formExperImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="form_exper_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FormExperImg $formExperImg): Response
    {
        $form = $this->createForm(FormExperImgType::class, $formExperImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('form_exper_img_index', [
                'id' => $formExperImg->getId(),
            ]);
        }

        return $this->render('form_exper_img/edit.html.twig', [
            'form_exper_img' => $formExperImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="form_exper_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FormExperImg $formExperImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formExperImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formExperImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('form_exper_img_index');
    }
}
