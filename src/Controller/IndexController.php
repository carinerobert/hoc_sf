<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use App\Repository\NewsletterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(
        Request $request,
        NewsletterRepository $newsletterRepository)
    {
        // $em =$this->getDoctrine()->getManager();
        // inutile avec l'injection de dépendance faite par entitymanagerinterface..

        //$newsletterItem = $newsletterRepository->createNewsletterItem(
        //    "lucas@ld-web.com"
        //);

        $newsletterItem = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletterItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
        }

        return $this->render(
            'index/index.html.twig', 
            [
                'newsletterItem' => $newsletterItem,
                'form' => $form->createView()
            ]
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
