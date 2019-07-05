<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $phytopharmacie = new Phytopharmarcie();
        $formulaire = $this->createForm(PhytopharmacieType::class, $phytopharmacie);
        $formulaire->handleRequest($request);

        if($formulaire->isSubmitted() && $formulaire->isValid()){
            
                   $manager->persist($phytopharmacie);
                   $manager->flush();
                   $this->addFlash('success', 'bien enregistré.');
                 return $this->RedirectToRoute('add_phyto'); 
           }
         return $this->render('admin/addPhyto.html.twig', [
             'controller_name' => 'AdminController',
             'all_actualite'=>$actualiteRepository->findAll(),          
             'formulaire' => $formulaire->createView(),
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
     public function addAgri(ObjectManager $manager, Request $request,AgriFinanceRepository $agriFinanceRepository)
     {
        $agriFinance=new AgriFinance();
        $formAgri = $this->createForm(AgriFinanceType::class, $agriFinance);
        $formAgri->handleRequest($request);

        if($formAgri->isSubmitted() && $formAgri->isValid()){
            
                   $manager->persist($agriFinance);
                   $manager->flush();
                   $this->addFlash('success', 'bien enregistré agri.');
                 return $this->RedirectToRoute('add_agri'); 
           }
         return $this->render('admin/addAgri.html.twig', [
             'controller_name' => 'AdminController',
             'formAgri'=> $formAgri->createView(),
             'liste' =>  $agriFinanceRepository->findAll(),
            
         ]);
     }
}
