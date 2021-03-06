<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterRegisterType;
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
        EntityManagerInterface $em)
    {
        // $em =$this->getDoctrine()->getManager();
        // inutile avec l'injection de dépendance faite par entitymanagerinterface..

        //$newsletterItem = $newsletterRepository->createNewsletterItem(
        //    "lucas@ld-web.com"
        //);

        $newsletterItem = new Newsletter();
        $form = $this->createForm(NewsletterRegisterType::class, $newsletterItem);
        // En cas de requête 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($newsletterItem);
            $em->flush();
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
