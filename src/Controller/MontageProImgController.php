<?php

namespace App\Controller;

use App\Entity\MontageProImg;
use App\Form\MontageProImgType;
use App\Repository\MontageProImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/montage/pro/img")
 */
class MontageProImgController extends AbstractController
{
    /**
     * @Route("/", name="montage_pro_img_index", methods={"GET"})
     */
    public function index(MontageProImgRepository $montageProImgRepository): Response
    {
        return $this->render('montage_pro_img/index.html.twig', [
            'montage_pro_imgs' => $montageProImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="montage_pro_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $montageProImg = new MontageProImg();
        $form = $this->createForm(MontageProImgType::class, $montageProImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($montageProImg);
            $entityManager->flush();

            return $this->redirectToRoute('montage_pro_img_index');
        }

        return $this->render('montage_pro_img/new.html.twig', [
            'montage_pro_img' => $montageProImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montage_pro_img_show", methods={"GET"})
     */
    public function show(MontageProImg $montageProImg): Response
    {
        return $this->render('montage_pro_img/show.html.twig', [
            'montage_pro_img' => $montageProImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="montage_pro_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MontageProImg $montageProImg): Response
    {
        $form = $this->createForm(MontageProImgType::class, $montageProImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('montage_pro_img_index', [
                'id' => $montageProImg->getId(),
            ]);
        }

        return $this->render('montage_pro_img/edit.html.twig', [
            'montage_pro_img' => $montageProImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montage_pro_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MontageProImg $montageProImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$montageProImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($montageProImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('montage_pro_img_index');
    }
}
