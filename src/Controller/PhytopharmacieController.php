<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Command;
use App\Form\CommandType;
use App\Form\RegistrationType;
use App\Repository\ActualiteRepository;
use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmacieType;
use App\Repository\PhytopharmarcieRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Controller\SecurityController;

class PhytopharmacieController extends AbstractController
{

    /**
         * @Route("/phytopharmacie", name ="phytopharmacie")
         */

        public function initialisePhytoSelect(ActualiteRepository $listActualiteRepository,
                                      UserPasswordEncoderInterface $encoder,
                                      ObjectManager $manager, 
                                      SecurityController $injector, 
                                      PhytopharmarcieRepository $phytopharmarcieRepository,
                                      Request $request): Response{
          try
            {
                //injector c'est un objet de type SecurityController qui nous permet d'acceder à la méthode
                //registration qui se trouve dans SecurityController
                //afin de pouvoir créer un compte dans cette page
                $injector->registration($request,$listActualiteRepository,$manager,$encoder);

                $command = new Command();
                $formCommand = $this->createForm(CommandType::class, $command);
                $user = new User();

                $phytopharmacie = new Phytopharmarcie();
                $formulaire = $this->createForm(PhytopharmacieType::class, $phytopharmacie);
                $form = $this->createForm(RegistrationType::class, $user);
                $resultCulture = $phytopharmarcieRepository->findByCulture($phytopharmacie->getCulture());
                $resultEnemie = $phytopharmarcieRepository->findByEnemie($phytopharmacie->getEnemie());
                $resultNomCommercial = $phytopharmarcieRepository->findByNomCommercial($phytopharmacie->getNomCommercial());
                $resultSociete = $phytopharmarcieRepository->findBySociete($phytopharmacie->getSociete());
                $resultMatiereActive = $phytopharmarcieRepository->findByMatiereActive($phytopharmacie->getMatiereActive());
                $resultClasse = $phytopharmarcieRepository->findByClasse($phytopharmacie->getClasse());


                //formulaire de reherche qui contient tous les selects présentns sur la vue
                $search = new Phytopharmarcie();
                $formResearch = $this->createForm(PhytopharmacieType::class, $search);
                $formResearch->handleRequest($request);
                $result = $phytopharmarcieRepository->findAllVisibleQuery($search);
                //end
                dump($result);

                 $formulaire->handleRequest($request);
                 if($formulaire->isSubmitted() && $formulaire->isValid()){
                       $manager->persist($phytopharmacie);
                       $manager->flush();
                       $this->addFlash('success', 'bien enregistré.');
                     return $this->RedirectToRoute('phytopharmacie'); 
               } 
                return
                $this->render('phytopharmacie/phytopharmacie.html.twig'
                , [
                    'controller_name' => 'PhytopharmacieController',
                    'form' => $form->createView(),
                    'formulaire' => $formulaire->createView(),
                    'curent'=>$phytopharmacie,
                    'listePhyto' =>  $phytopharmarcieRepository->findAll(),
                    'resultCulture' => $resultCulture,
                    'resultEnemie' => $resultEnemie,
                    'resultNomCommercial' => $resultNomCommercial,
                    'resultSociete' => $resultSociete,
                    'resultMatiereActive' => $resultMatiereActive,
                    'resultClasse' => $resultClasse,
                    'formCommand' => $formCommand->createView(),

                    'result' => $result,
                    'formResearch' => $formResearch->createView(),

                ]);
            }catch(Exception $exception){
                $this->addFlash('errorConnexion', 'Please Check your connexion!');
        }
    }

    /**
     * @Route("/commande", name="passer_commande", methods={"POST","GET"})
     */
    public function passerCommander(ObjectManager $manager, Request $request):Response
    {
      $command = new Command();
      $u = new User();
      $u->setNoms("non");
     

        $formCommand = $this->createForm(CommandType::class, $command);
      
        $formCommand->handleRequest($request);

        if($formCommand->isSubmitted() && $formCommand->isValid()){
           if($this->getUser() !== null){

        $u->setNoms("oui");

          $userConnected = $this->getUser();
          $id = $this->getUser()->getId();
          dump($userConnected);
          //dump($this->getUser()->getUsername());

                $command->setRelation($this->getUser());
                $command->setUser($this->getUser());
                $manager->persist($command);
                $manager->flush();
                $this->addFlash('success', 'Commande enregistrée avec succès.');
                return $this->redirectToRoute('phytopharmacie');
                 dump($command);
        }
       
        else{
          $this->addFlash('error', 'erreur lors de la commande');
          dump($this->getUser()->getUsername());
                 return $this->redirectToRoute('phytopharmacie');
        }
         dump($command);

      }else {
        $u->setNoms("non non");
      }

      dump($u);

       return $this->render('phytopharmacie/phytopharmacie.html.twig',[
          'controller_name' => 'CommandController',
          'formCommand' => $formCommand->createView()
        ]);

        
    }

}
