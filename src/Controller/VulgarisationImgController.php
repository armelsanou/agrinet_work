<?php

namespace App\Controller;

use App\Entity\VulgarisationImg;
use App\Form\VulgarisationImgType;
use App\Repository\VulgarisationImgRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vulgarisation/img")
 */
class VulgarisationImgController extends AbstractController
{
    /**
     * @Route("/", name="vulgarisation_img_index", methods={"GET"})
     */
    public function index(VulgarisationImgRepository $vulgarisationImgRepository): Response
    {
        return $this->render('vulgarisation_img/index.html.twig', [
            'vulgarisation_imgs' => $vulgarisationImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vulgarisation_img_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vulgarisationImg = new VulgarisationImg();
        $form = $this->createForm(VulgarisationImgType::class, $vulgarisationImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vulgarisationImg);
            $entityManager->flush();

            return $this->redirectToRoute('vulgarisation_img_index');
        }

        return $this->render('vulgarisation_img/new.html.twig', [
            'vulgarisation_img' => $vulgarisationImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vulgarisation_img_show", methods={"GET"})
     */
    public function show(VulgarisationImg $vulgarisationImg): Response
    {
        return $this->render('vulgarisation_img/show.html.twig', [
            'vulgarisation_img' => $vulgarisationImg,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vulgarisation_img_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VulgarisationImg $vulgarisationImg): Response
    {
        $form = $this->createForm(VulgarisationImgType::class, $vulgarisationImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vulgarisation_img_index', [
                'id' => $vulgarisationImg->getId(),
            ]);
        }

        return $this->render('vulgarisation_img/edit.html.twig', [
            'vulgarisation_img' => $vulgarisationImg,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vulgarisation_img_delete", methods={"DELETE"})
     */
    public function delete(Request $request, VulgarisationImg $vulgarisationImg): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vulgarisationImg->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vulgarisationImg);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vulgarisation_img_index');
    }
}
