<?php

namespace App\Controller;

use App\Entity\ProposedReferendum;
use App\Entity\Referendum;
use App\Repository\ProposedReferendumRepository;
use App\Repository\ReferendumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{


    /**
     * @Route("/", name="public_home")
     */
    public function public_index(ReferendumRepository $referendumRepository,ProposedReferendumRepository $proposedReferendumRepository): Response
    {
        return $this->render('public/index.html.twig', [
            'referendums' => $referendumRepository->findAll(),
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

    /**
     * @Route("show/{id}", name="show", methods={"GET"})
     */
    public function show(Referendum $referendum): Response
    {
        return $this->render('public/show.html.twig', [
            'referendum' => $referendum,
        ]);
    }

    /**
     * @Route("showTwo/{id}", name="showTwo", methods={"GET"})
     */
    public function showTwo(ProposedReferendum $proposedReferendum): Response
    {
        return $this->render('public/showTwo.html.twig', [
            'proposed_referendum' => $proposedReferendum,
        ]);
    }




}
