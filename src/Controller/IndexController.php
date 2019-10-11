<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * on modifie la route du coup ce sera notre première page
     * arobaseRoute("/index", name="index")
     * en
     * @Route("/", name="homepage")
     * méthode de la page d'accueil
     */
    public function index()
    {
        return $this->render(
            'index/index.html.twig', 
            ['controller_name' => 'IndexController',]
        );
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render(
            'index/contact.html.twig',
        );
    }
}
