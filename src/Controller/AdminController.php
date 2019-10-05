<?php

namespace App\Controller;

use App\Entity\AgriFinanceCategorie;
use App\Entity\AgriFinanceStructure;
use App\Entity\BibliothequeRecherche;
use App\Form\AgriFinanceCategorieType;
use App\Form\AgriFinanceStructureType;
use App\Form\BibliothequeRechercheType;
use App\Form\PhytopharmarcieType;
use App\Repository\AgriFinanceCategorieRepository;
use App\Repository\AgriFinanceStructureRepository;
use App\Repository\BibliothequeRechercheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Actualite;
use App\Form\ActualiteType;
use App\Entity\Phytopharmarcie;
use App\Form\PhytopharmacieType;
use App\Repository\PhytopharmarcieRepository;
use App\Entity\AgriFinance;
use App\Form\AgriFinanceType;
use App\Form\RegistrationType;
use App\Repository\AgriFinanceRepository;
use App\Repository\UserRepository;
use App\Repository\NewslettersRepository;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\VarieteRacesCaracteristique;
use App\Form\VarieteRacesCaracteristiqueType;
use App\Repository\VarieteRacesCaracteristiqueRepository;
use App\Entity\EspacePub1;
use App\Form\EspacePub1Type;
use App\Form\EspacePub2Type;
use App\Entity\EspacePub2;
use App\Repository\EspacePub1Repository;
use App\Repository\EspacePub2Repository;
use App\Entity\Organisation;
use App\Form\OrganisationType;
use App\Repository\OrganisationRepository;
use App\Entity\StrategieActionImg;
use App\Form\StrategieActionImgType;
use App\Repository\StrategieActionImgRepository;
use App\Entity\SuiviAgriImg;
use App\Form\SuiviAgriImgType;
use App\Repository\SuiviAgriImgRepository;
use App\Entity\FormExperImg;
use App\Form\FormExperImgType;
use App\Entity\FormationInitImg;
use App\Form\FormationInitImgType;
use App\Repository\FormExperImgRepository;
use App\Repository\FormationInitImgRepository;
use App\Entity\RenforcementCapacite;
use App\Form\RenforcementCapaciteType;
use App\Repository\RenforcementCapaciteRepository;


use App\Entity\FormPratiqueImg;
use App\Form\FormPratiqueImgType;
use App\Repository\FormPratiqueImgRepository;
use App\Entity\MontageProImg;
use App\Form\MontageProImgType;
use App\Repository\MontageProImgRepository;
use App\Entity\GestionSolImg;
use App\Form\GestionSolImgType;
use App\Repository\GestionSolImgRepository;
use App\Entity\VulgarisationImg;
use App\Form\VulgarisationImgType;
use App\Repository\VulgarisationImgRepository;
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $user = new User();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

     /**
     * @Route("/all/user", name="all_user")
     */
     public function allUser(ObjectManager $manager, Request $request,UserRepository $userRepository)
     {
        
         return $this->render('admin/allUser.html.twig', [
             'controller_name' => 'AdminController',
             'all_user' =>$userRepository->findAll()
         ]);
     }
     /**
     * @Route("/all/user/newsletter", name="all_user_newsletter")
     */
     public function allUserNewsletter(ObjectManager $manager, Request $request,NewslettersRepository $newslettersRepository)
     {
        
         return $this->render('admin/userNewsletter.html.twig', [
             'controller_name' => 'AdminController',
             'all_user_newsletter' =>$newslettersRepository->findAll()
         ]);
     }
      /**
     * @Route("/add/actualite", name="add_actualiter")
     */
     public function addActualiter(ObjectManager $manager, Request $request,NewslettersRepository $newslettersRepository,ActualiteRepository $actualiteRepository)
     {
        $actualite = new Actualite(); 
        $formActu = $this->createForm(ActualiteType::class, $actualite);
        $formActu->handleRequest($request);

        if($formActu->isSubmitted() && $formActu->isValid()){

           $file=$actualite->getImage();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);

            $actualite->setImage($fileName);
            $actualite->setCreatedAt(new \DateTime());

              $manager->persist($actualite);
              $manager->flush();
              $this->addFlash('success', 'Votre compte à bien été enregistré.');

              return $this->redirectToRoute('add_actualiter');
          

      }
         return $this->render('admin/addActualite.html.twig', [
             'controller_name' => 'AdminController',
             'all_actualite'=>$actualiteRepository->findAll(),
             'formActu' => $formActu->createView(),
            
         ]);
     }


     /**
     * @Route("/add/phyto", name="add_phyto")
     */
     public function addPhyto(ObjectManager $manager, Request $request,PhytopharmarcieRepository $phytopharmarcieRepository,NewslettersRepository $newslettersRepository,ActualiteRepository $actualiteRepository)
     {
         $phytopharmarcie = new Phytopharmarcie();
         $form = $this->createForm(PhytopharmarcieType::class, $phytopharmarcie);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($phytopharmarcie);
             $entityManager->flush();

             return $this->redirectToRoute('add_phyto');
         }

         return $this->render('admin/addPhyto.html.twig', [
             'controller_name' => 'AdminController',
             'form' => $form->createView(),
             'listePhyto' =>  $phytopharmarcieRepository->findAll(),
            
         ]);
     }

      /**
     * @Route("/edit//phyto", name="editPhyto_edit",methods={"GET","POST"})
     */
    public function editPhyto(Request $request, Phytopharmarcie $phytopharmarcie)
    {
        $formEdit = $this->createForm(PhytopharmarcieType::class, $phytopharmarcie);
        $formEdit->handleRequest($request);

        if ($formEdit->isSubmitted() && $formEdit->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editPhyto_edit', [
                'id' => $phytopharmarcie->getId(),
            ]);
        }
        return $this->render('admin/editPhyto.html.twig', [
            'controller_name' => 'AdminController',
            'formEdit' => $formEdit->createView(),
        ]);
    }


     /**
     * @Route("/add/agri", name="add_agri")
     */
     public function addAgri(ObjectManager $manager, Request $request,AgriFinanceRepository $agriFinanceRepository,AgriFinanceCategorieRepository $agriFinanceCategorieRepository)
     {
         $agriFinanceCategorie = new AgriFinanceCategorie();
         $form = $this->createForm(AgriFinanceCategorieType::class, $agriFinanceCategorie);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($agriFinanceCategorie);
             $entityManager->flush();

             return $this->redirectToRoute('add_agri');
         }
         return $this->render('admin/addAgri.html.twig', [
             'controller_name' => 'AdminController',
             'form' => $form->createView(),
             'agri_finance_categories' => $agriFinanceCategorieRepository->findAll(),
            
         ]);
     }

    /**
     * @Route("/add/agri/struc", name="add_agri_struc")
     */
    public function addAgriStruc(ObjectManager $manager, Request $request,AgriFinanceStructureRepository $agriFinanceStructureRepository,AgriFinanceRepository $agriFinanceRepository,AgriFinanceCategorieRepository $agriFinanceCategorieRepository)
    {
        $agriFinanceStructure = new AgriFinanceStructure();
        $form = $this->createForm(AgriFinanceStructureType::class, $agriFinanceStructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($agriFinanceStructure);
            $entityManager->flush();

            return $this->redirectToRoute('add_agri_struc');
        }

        return $this->render('admin/addAgriStruc.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'agri_finance_structures' => $agriFinanceStructureRepository->findAll(),

        ]);
    }



    /**
     * @Route("/add/variete", name="add_variete")
     */
    public function addVriete(Request $request,VarieteRacesCaracteristiqueRepository $varieteRacesCaracteristiqueRepository)

    {
        $varieteRacesCaracteristique= new VarieteRacesCaracteristique();
        $test=$varieteRacesCaracteristiqueRepository->findVarietyByCategory('test','test','test');
        dump($test);
        $form = $this->createForm(VarieteRacesCaracteristiqueType::class, $varieteRacesCaracteristique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($varieteRacesCaracteristique);
            $entityManager->flush();

            return $this->redirectToRoute('add_variete');
        }
        return $this->render('admin/formRchercheVariete1.html.twig', [
            'variete_races_caracteristiques' => $varieteRacesCaracteristiqueRepository->findAll(),
            'test'=> $test,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/add/bibliotheque/recherche", name="add_bibliotheque_recherche")
     */
    public function addBiblioRecherche(Request $request,BibliothequeRechercheRepository $bibliothequeRechercheRepository): Response
    {
        $bibliothequeRecherche = new BibliothequeRecherche();
        $form = $this->createForm(BibliothequeRechercheType::class, $bibliothequeRecherche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bibliothequeRecherche);
            $entityManager->flush();

            return $this->redirectToRoute('add_bibliotheque_recherche');
        }

        return $this->render('admin/formRcherchebibliotheque.html.twig', [
            'bibliotheque_recherches' => $bibliothequeRechercheRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="add_espace_pub1", methods={"GET","POST"})
     */
     public function addEspacePub1(Request $request,EspacePub1Repository $espacePub1Repository): Response
     {
         $espacePub1 = new EspacePub1();
         $formPub1 = $this->createForm(EspacePub1Type::class, $espacePub1);
         $formPub1->handleRequest($request);
 
         if ($formPub1->isSubmitted() && $formPub1->isValid()) {
            $file=$espacePub1->getPhoto1();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $espacePub1->setPhoto1($fileName);
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($espacePub1);
             $entityManager->flush();
 
             return $this->redirectToRoute('add_espace_pub1');
         }
 
         return $this->render('admin/addEspacePub1.html.twig', [
             'espace_pub1' => $espacePub1,
             'espace_pub1s' => $espacePub1Repository->findAll(),
             'formPub1' => $formPub1->createView(),
         ]);
     }


        /**
     * @Route("/new/pub2", name="add_espace_pub2", methods={"GET","POST"})
     */
    public function addEspacePub2(Request $request,EspacePub2Repository $espacePub2Repository): Response
    {
        $espacePub2 = new EspacePub2();
        $formPub2 = $this->createForm(EspacePub2Type::class, $espacePub2);
        $formPub2->handleRequest($request);

        if ($formPub2->isSubmitted() && $formPub2->isValid()) {
            $file=$espacePub2->getPhoto();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $espacePub2->setPhoto($fileName);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($espacePub2);
            $entityManager->flush();

            return $this->redirectToRoute('add_espace_pub2');
        }

        return $this->render('admin/addEspacePub2.html.twig', [
            'espace_pub2' => $espacePub2,
            'formPub2' => $formPub2->createView(),
            'espace_pub2s' => $espacePub2Repository->findAll(),
        ]);
    }



     /**
     * @Route("/new/Organisation_new", name="addOrganisation_new", methods={"GET","POST"})
     */
     public function new(Request $request,OrganisationRepository $organisationRepository): Response
     {
         $organisation = new Organisation();
         $formOrganisation = $this->createForm(OrganisationType::class, $organisation);
         $formOrganisation->handleRequest($request);
 
         if ($formOrganisation->isSubmitted() && $formOrganisation->isValid()) {
            $file=$organisation->getImageOrganisation();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $organisation->setImageOrganisation($fileName);
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($organisation);
             $entityManager->flush();
 
             return $this->redirectToRoute('addOrganisation_new');
         }
 
         return $this->render('admin/addImgOrganisation.html.twig', [
             'organisation' => $organisation,
             'formOrganisation' => $formOrganisation->createView(),
             'organisations' => $organisationRepository->findAll(),
         ]);
     }


     /**
     * @Route("/new/add_strategie", name="add_strategie_action_img_new", methods={"GET","POST"})
     */
    public function addStrategieImg(Request $request,StrategieActionImgRepository $strategieActionImgRepository): Response
    {
        $strategieActionImg = new StrategieActionImg();
        $formStrategie = $this->createForm(StrategieActionImgType::class, $strategieActionImg);
        $formStrategie->handleRequest($request);

        if ($formStrategie->isSubmitted() && $formStrategie->isValid()) {
            $file=$strategieActionImg->getImage();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $strategieActionImg->setImage($fileName);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($strategieActionImg);
            $entityManager->flush();

            return $this->redirectToRoute('add_strategie_action_img_new');
        }

        return $this->render('admin/addImgStrategieAction.html.twig', [
            'strategie_action_img' => $strategieActionImg,
            'formStrategie' => $formStrategie->createView(),
            'strategie_action_imgs' => $strategieActionImgRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/addSuivi", name="add_suivi_agri_img_new", methods={"GET","POST"})
     */
     public function addSuivi(Request $request,SuiviAgriImgRepository $suiviAgriImgRepository): Response
     {
         $suiviAgriImg = new SuiviAgriImg();
         $formSuivi = $this->createForm(SuiviAgriImgType::class, $suiviAgriImg);
         $formSuivi->handleRequest($request);
 
         if ($formSuivi->isSubmitted() && $formSuivi->isValid()) {
            $file=$suiviAgriImg->getImage();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $suiviAgriImg->setImage($fileName);
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($suiviAgriImg);
             $entityManager->flush();
 
             return $this->redirectToRoute('add_suivi_agri_img_new');
         }
 
         return $this->render('admin/addSuiviImg.html.twig', [
             'suivi_agri_img' => $suiviAgriImg,
             'formSuivi' => $formSuivi->createView(),
             'suivi_agri_imgs' => $suiviAgriImgRepository->findAll(),
         ]);
     }

     /**
     * @Route("/new/addFormExpert", name="add_orm_exper_img_new", methods={"GET","POST"})
     */
    public function addFormExpert(Request $request,FormExperImgRepository $formExperImgRepository): Response
    {
        $formExperImg = new FormExperImg();
        $formExp = $this->createForm(FormExperImgType::class, $formExperImg);
        $formExp->handleRequest($request);

        if ($formExp->isSubmitted() && $formExp->isValid()) {
            $file=$formExperImg->getImage1();
            $file2=$formExperImg->getImage2();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $fileName2= md5(uniqid()).'.'.$file2->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $file2->move($this->getParameter('upload_directoy'), $fileName2);

            $formExperImg->setImage1($fileName);
            $formExperImg->setImage2($fileName2);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formExperImg);
            $entityManager->flush();

            return $this->redirectToRoute('add_orm_exper_img_new');
        }

        return $this->render('admin/addFormExper.html.twig', [
            'form_exper_img' => $formExperImg,
            'formExp' => $formExp->createView(),
            'form_exper_imgs' => $formExperImgRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new/addFormationInit", name="add_formation_init_img_new", methods={"GET","POST"})
     */
     public function addFormationInit(Request $request,FormationInitImgRepository $formationInitImgRepository): Response
     {
         $formationInitImg = new FormationInitImg();
         $formInitImg = $this->createForm(FormationInitImgType::class, $formationInitImg);
         $formInitImg->handleRequest($request);
 
         if ($formInitImg->isSubmitted() && $formInitImg->isValid()) {
            $file=$formationInitImg->getImage1();
            $file2=$formationInitImg->getImage2();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $fileName2= md5(uniqid()).'.'.$file2->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $file2->move($this->getParameter('upload_directoy'), $fileName2);

            $formationInitImg->setImage1($fileName);
            $formationInitImg->setImage2($fileName2);

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($formationInitImg);
             $entityManager->flush();
 
             return $this->redirectToRoute('add_formation_init_img_new');
         }
 
         return $this->render('admin/addFormInit.html.twig', [
             'formation_init_img' => $formationInitImg,
             'formInitImg' => $formInitImg->createView(),
             'formation_init_imgs' => $formationInitImgRepository->findAll(),
         ]);
     }
 

   
     /**
     * @Route("/new/addRenforcement", name="add_renforcement_capacite_new", methods={"GET","POST"})
     */
     public function addRenforcement(Request $request,FormPratiqueImgRepository $formPratiqueImgRepository): Response
     {
         $formPratiqueImg = new FormPratiqueImg();
         $formRenforcement = $this->createForm(FormPratiqueImgType::class, $formPratiqueImg);
         $formRenforcement->handleRequest($request);
 
         if ($formRenforcement->isSubmitted() && $formRenforcement->isValid()) {
            $file=$formPratiqueImg->getImage1();
            $file2=$formPratiqueImg->getImage2();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $fileName2= md5(uniqid()).'.'.$file2->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $file2->move($this->getParameter('upload_directoy'), $fileName2);

            $formPratiqueImg->setImage1($fileName);
            $formPratiqueImg->setImage2($fileName2);
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($formPratiqueImg);
             $entityManager->flush();
 
             return $this->redirectToRoute('add_renforcement_capacite_new');
         }
 
         return $this->render('admin/addRenforcement.html.twig', [
             'form_pratique_img' => $formPratiqueImg,
             'formRenforcement' => $formRenforcement->createView(),
             'renforcement_capacites' => $formPratiqueImgRepository->findAll(),
         ]);
     }

 
     /**
     * @Route("/new/addMontage", name="add_montage_pro_img_new", methods={"GET","POST"})
     */
    public function addMontage(Request $request,MontageProImgRepository $montageProImgRepository): Response
    {
        $montageProImg = new MontageProImg();
        $formMontage = $this->createForm(MontageProImgType::class, $montageProImg);
        $formMontage->handleRequest($request);

        if ($formMontage->isSubmitted() && $formMontage->isValid()) {
            $file=$montageProImg->getImage();  
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $montageProImg->setImage($fileName);
          
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($montageProImg);
            $entityManager->flush();

            return $this->redirectToRoute('add_montage_pro_img_new');
        }

        return $this->render('admin/addMontage.html.twig', [
            'montage_pro_img' => $montageProImg,
            'formMontage' => $formMontage->createView(),
            'montage_pro_imgs' => $montageProImgRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new/addGestionSol", name="add_gestion_sol_img_new", methods={"GET","POST"})
     */
     public function addGestionSol(Request $request,GestionSolImgRepository $gestionSolImgRepository): Response
     {
         $gestionSolImg = new GestionSolImg();
         $formGestion = $this->createForm(GestionSolImgType::class, $gestionSolImg);
         $formGestion->handleRequest($request);
 
         if ($formGestion->isSubmitted() && $formGestion->isValid()) {
            $file=$gestionSolImg->getImage1();
            $file2=$gestionSolImg->getImage2();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $fileName2= md5(uniqid()).'.'.$file2->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $file2->move($this->getParameter('upload_directoy'), $fileName2);

            $gestionSolImg->setImage1($fileName);
            $gestionSolImg->setImage2($fileName2);
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($gestionSolImg);
             $entityManager->flush();
 
             return $this->redirectToRoute('add_gestion_sol_img_new');
         }
 
         return $this->render('admin/addGestion.html.twig', [
             'gestion_sol_img' => $gestionSolImg,
             'formGestion' => $formGestion->createView(),
             'gestion_sol_imgs' => $gestionSolImgRepository->findAll(),
         ]);
     }


     /**
     * @Route("/new/addVulgarisation", name="add_vulgarisation_img_new", methods={"GET","POST"})
     */
    public function addVulgarisation(Request $request,VulgarisationImgRepository $vulgarisationImgRepository): Response
    {
        $vulgarisationImg = new VulgarisationImg();
        $formVulgarisation = $this->createForm(VulgarisationImgType::class, $vulgarisationImg);
        $formVulgarisation->handleRequest($request);

        if ($formVulgarisation->isSubmitted() && $formVulgarisation->isValid()) {
            $file=$vulgarisationImg->getImage1();
            $file2=$vulgarisationImg->getImage2();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $fileName2= md5(uniqid()).'.'.$file2->guessExtension();
            $file->move($this->getParameter('upload_directoy'), $fileName);
            $file2->move($this->getParameter('upload_directoy'), $fileName2);

            $vulgarisationImg->setImage1($fileName);
            $vulgarisationImg->setImage2($fileName2);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vulgarisationImg);
            $entityManager->flush();

            return $this->redirectToRoute('add_vulgarisation_img_new');
        }

        return $this->render('admin/addVulgarisation.html.twig', [
            'vulgarisation_img' => $vulgarisationImg,
            'formVulgarisation' => $formVulgarisation->createView(),
            'vulgarisation_imgs' => $vulgarisationImgRepository->findAll(),
        ]);
    }
 

}
