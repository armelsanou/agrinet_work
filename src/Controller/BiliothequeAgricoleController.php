<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\VarieteRacesCaracteristique;
use App\Entity\Command;
use App\Form\CommandType;
use App\Form\RegistrationType;
use App\Entity\BibliothequeRecherche;
use App\Form\BibliothequeRechercheType;
use App\Repository\BibliothequeRepository;
use App\Form\VarieteRacesCaracteristiqueType;
use App\Repository\PhytopharmarcieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BibliothequeRechercheRepository;
use App\Repository\VarieteRacesCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BiliothequeAgricoleController extends AbstractController
{
    
     // fonction pour ajouter les varietés et races 

    /**
     * @Route("/bibliotheque_agricole", name="bibliotheque_agricole")
     */
    public function index(ObjectManager $manager, BibliothequeRechercheRepository $bibliothequeRechercheRepository, Request $request)
    {
        $user = new User();
        $command = new Command();
        $formCommand = $this->createForm(CommandType::class, $command);
        $form = $this->createForm(RegistrationType::class, $user);
        $formCommand->handleRequest($request);

        if ($formCommand->isSubmitted() && $formCommand->isValid()) {
            $command->setUser($this->getUser());
            $manager->persist($command);
            $manager->flush();

            return $this->redirectToRoute('bibliotheque_agricole');
        }

        return $this->render('bibliotheque_agricole/bibliotheque_agricole_recherche.html.twig', [
            'listeBiblioRecherche' => $bibliothequeRechercheRepository->findAll(),
            'formCommand' =>$formCommand->createView(),
            'form' => $form->createView(),
        ]);
    }

        /**
     * @Route("/new", name="bibliotheque_recherche_new", methods={"GET","POST"})
     */
    public function new(ObjectManager $manager,Request $request): Response
    {
        $bibliothequeRecherche = new BibliothequeRecherche();
        $formvrc = $this->createForm(BibliothequeRecherche1Type::class, $bibliothequeRecherche);
        $formvrc->handleRequest($request);

        if ($formvrc->isSubmitted() && $formvrc->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bibliothequeRecherche);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_agricole');
        }

        return $this->render('bibliotheque_agricole/bibliotheque_agricole_recherche.html.twig', [
            'bibliotheque_recherche' => $bibliothequeRecherche,
            'formvrc' => $formvrc->createView(),
        ]);
    }
}
