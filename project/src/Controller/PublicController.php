<?php

namespace App\Controller;

use App\Repository\ProposedReferendumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="public_home")
     */
    public function public_index(ProposedReferendumRepository $proposedReferendumRepository): Response
    {
        return $this->render('public/index.html.twig', [
            'proposed_referendums' => $proposedReferendumRepository->findAll(),
        ]);
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

    /**
     * @Route("/loginselect", name="loginselect")
     */
    public function loginselect()
    {
        return $this->render('public/loginselect.html.twig');
    }
}
