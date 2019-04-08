<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="public_home")
     */
    public function public_index()
    {
        return $this->render('public/index.html.twig');
    }

    /**
 * @Route("/about", name="public_about")
 */
    public function public_about()
    {
        return $this->render('public/about.html.twig');
    }

    /**
     * @Route("/contact", name="public_contact")
     */
    public function public_contact()
    {
        return $this->render('public/contact.html.twig');
    }
}
