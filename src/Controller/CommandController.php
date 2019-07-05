<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Command;
use App\Form\CommandType;
use App\Repository\CommandRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandController extends AbstractController
{

    /**
     * @Route("/commander", name="commander", methods={"GET", "POST"})
     */
    public function commander(ObjectManager $manager, Request $request):Response
    {
      $command = new Command();
       $formCommand = $this->createForm(CommandType::class, $command);
      
        $formCommand->handleRequest($request);

      if($this->getUser() !== null){

          $userConnected = $this->getUser();
          $id = $this->getUser()->getId();
          dump($userConnected);
          //dump($this->getUser()->getUsername());

        if($formCommand->isSubmitted() && $formCommand->isValid()){
                $manager->persist($command);
                $manager->flush();
                $this->addFlash('success', 'Commande enregistrée avec succès.');
                return $this->redirectToRoute('phytopharmacie');
        }
        else{
          $this->addFlash('error', 'erreur lors de la commande');
          dump($this->getUser()->getUsername());
                 return $this->redirectToRoute('phytopharmacie');
        }

      }

       return $this->render('phytopharmacie/phytopharmacie.html.twig',[
          'controller_name' => 'CommandController',
          'formCommand' => $formCommand->createView()
        ]);

        
    }
}
