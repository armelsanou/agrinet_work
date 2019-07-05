<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\RegistrationType;
class PageErrorController extends AbstractController
{
    /**
     * @Route("/page/error", name="page_error")
     */
    public function index(ObjectManager $manager, Request $request)
    {
         $user = new User();
         $form = $this->createForm(RegistrationType::class, $user);

        return $this->render('page_error/index.html.twig', [
            'controller_name' => 'PageErrorController',
            'form' => $form->createView(),
        ]);
    }
}
