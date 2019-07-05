<?php

namespace App\Controller;

use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmarcieType;
use App\Repository\PhytopharmarcieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/phytopharmarcie")
 */
class PhytopharmarcieController extends AbstractController
{
    /**
     * @Route("/", name="phytopharmarcie_index", methods={"GET"})
     */
    public function index(PhytopharmarcieRepository $phytopharmarcieRepository): Response
    {
        return $this->render('phytopharmarcie/index.html.twig', [
            'phytopharmarcies' => $phytopharmarcieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="phytopharmarcie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $phytopharmarcie = new Phytopharmarcie();
        $form = $this->createForm(PhytopharmarcieType::class, $phytopharmarcie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($phytopharmarcie);
            $entityManager->flush();

            return $this->redirectToRoute('phytopharmarcie_index');
        }

        return $this->render('phytopharmarcie/new.html.twig', [
            'phytopharmarcie' => $phytopharmarcie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="phytopharmarcie_show", methods={"GET"})
     */
    public function show(Phytopharmarcie $phytopharmarcie): Response
    {
        return $this->render('phytopharmarcie/show.html.twig', [
            'phytopharmarcie' => $phytopharmarcie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="phytopharmarcie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Phytopharmarcie $phytopharmarcie): Response
    {
        $form = $this->createForm(PhytopharmarcieType::class, $phytopharmarcie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('add_phyto', [
                'id' => $phytopharmarcie->getId(),
            ]);
        }

        return $this->render('phytopharmarcie/edit.html.twig', [
            'phytopharmarcie' => $phytopharmarcie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="phytopharmarcie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Phytopharmarcie $phytopharmarcie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$phytopharmarcie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($phytopharmarcie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('add_phyto');
    }
}
