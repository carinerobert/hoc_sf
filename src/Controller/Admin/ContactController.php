<?php

namespace App\Controller\Admin;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact_index")
     */
    public function index(ContactRepository $contactRepository)
    {
        $contactsDemand = $contactRepository->findAll();
        return $this->render('admin/contact/index.html.twig', 
        [ 'contactsDemand' =>$contactsDemand]);
    }
}
