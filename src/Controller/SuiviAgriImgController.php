<?php

namespace App\Controller;

use App\Entity\SuiviAgriImg;
use App\Form\SuiviAgriImgType;
use App\Repository\SuiviAgriImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/suivi/agri/img")
 */
class SuiviAgriImgController extends AbstractController
{
    /**
     * @Route("/", name="suivi_agri_img_index", methods={"GET"})
     */
    public function index(SuiviAgriImgRepository $suiviAgriImgRepository): Response
    {
        return $this->render('suivi_agri_img/index.html.twig', [
            'suivi_agri_imgs' => $suiviAgriImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="suivi_agri_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $suiviAgriImg = new SuiviAgriImg();
        $form = $this->createForm(SuiviAgriImgType::class, $suiviAgriImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($suiviAgriImg);
            $entityManager->flush();

            return $this->redirectToRoute('suivi_agri_img_index');
        }

        return $this->render('suivi_agri_img/new.html.twig', [
            'suivi_agri_img' => $suiviAgriImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivi_agri_img_show", methods={"GET"})
     */
    public function show(SuiviAgriImg $suiviAgriImg): Response
    {
        return $this->render('suivi_agri_img/show.html.twig', [
            'suivi_agri_img' => $suiviAgriImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="suivi_agri_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SuiviAgriImg $suiviAgriImg): Response
    {
        $form = $this->createForm(SuiviAgriImgType::class, $suiviAgriImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suivi_agri_img_index', [
                'id' => $suiviAgriImg->getId(),
            ]);
        }

        return $this->render('suivi_agri_img/edit.html.twig', [
            'suivi_agri_img' => $suiviAgriImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivi_agri_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SuiviAgriImg $suiviAgriImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suiviAgriImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($suiviAgriImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suivi_agri_img_index');
    }
}
