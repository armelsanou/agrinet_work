<?php

namespace App\Controller;

use App\Entity\StrategieActionImg;
use App\Form\StrategieActionImgType;
use App\Repository\StrategieActionImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/strategie/action/img")
 */
class StrategieActionImgController extends AbstractController
{
    /**
     * @Route("/", name="strategie_action_img_index", methods={"GET"})
     */
    public function index(StrategieActionImgRepository $strategieActionImgRepository): Response
    {
        return $this->render('strategie_action_img/index.html.twig', [
            'strategie_action_imgs' => $strategieActionImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="strategie_action_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $strategieActionImg = new StrategieActionImg();
        $form = $this->createForm(StrategieActionImgType::class, $strategieActionImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($strategieActionImg);
            $entityManager->flush();

            return $this->redirectToRoute('strategie_action_img_index');
        }

        return $this->render('strategie_action_img/new.html.twig', [
            'strategie_action_img' => $strategieActionImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="strategie_action_img_show", methods={"GET"})
     */
    public function show(StrategieActionImg $strategieActionImg): Response
    {
        return $this->render('strategie_action_img/show.html.twig', [
            'strategie_action_img' => $strategieActionImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="strategie_action_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StrategieActionImg $strategieActionImg): Response
    {
        $form = $this->createForm(StrategieActionImgType::class, $strategieActionImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('strategie_action_img_index', [
                'id' => $strategieActionImg->getId(),
            ]);
        }

        return $this->render('strategie_action_img/edit.html.twig', [
            'strategie_action_img' => $strategieActionImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="strategie_action_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StrategieActionImg $strategieActionImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$strategieActionImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($strategieActionImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('strategie_action_img_index');
    }
}
