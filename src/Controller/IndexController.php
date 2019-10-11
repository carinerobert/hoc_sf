<?php

namespace App\Controller;

use App\Entity\Newsletter;
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
        $em =$this->getDoctrine()->getManager();

        $newsletterItem = new Newsletter();
        $newsletterItem->setEmail('me.crob@me.com')
                ->getSubscribed(true);

        return $this->render(
            'index/index.html.twig', 
            ['newsletterItem' => $newsletterItem]
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
