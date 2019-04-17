<?php

namespace App\Controller;

use App\Repository\ProposedReferendumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(ProposedReferendumRepository $proposedReferendumRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'proposed_referendums' => $proposedReferendumRepository->findAll(),
        ]);
    }
}
