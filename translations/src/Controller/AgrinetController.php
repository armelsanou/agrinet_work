<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AgrinetController extends AbstractController
{


    public function homepageAction()
    {
        /* return new Response('OMG! My first page already! WOOO!'); */
        return $this->render('VuesAgrinet/index.html.twig');
    }

}


