<?php

namespace App\Controller;

use App\Entity\Referendum;
use App\Form\ReferendumType;
use App\Repository\ProposedReferendumRepository;
use App\Repository\ReferendumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/referendum")
 * @IsGranted("ROLE_ADMIN")
 */
class ReferendumController extends AbstractController
{
    /**
     * @Route("/", name="referendum_index", methods={"GET"})
     */
    public function index(ReferendumRepository $referendumRepository,ProposedReferendumRepository $proposedReferendumRepository): Response
    {
        return $this->render('referendum/index.html.twig', [
            'referendums' => $referendumRepository->findAll(),
                'proposed_referendums' => $proposedReferendumRepository->findAll(),
            ]);
    }

    /**
     * @Route("/voteFor", name="voteFor", methods={"POST"})
     */

    public function voteFor(Request $request, ReferendumRepository $ReferendumRepository){
        $Referendum = $ReferendumRepository->find($request->request->get('id'));

        $voteFor = $Referendum->getVotesFor();
        $Referendum->setVotesFor($voteFor + 1);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Referendum);
        $entityManager->flush();

        return $this->redirectToRoute('referendum_index');
    }

    /**
     * @Route("/voteAgainst", name="voteAgainst", methods={"POST"})
     */
    public function voteAgainst(Request $request, ReferendumRepository $ReferendumRepository){
        $Referendum = $ReferendumRepository->find($request->request->get('id'));

        $voteAgainst = $Referendum->getVotesAgainst();
        $Referendum->setVotesAgainst($voteAgainst + 1);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Referendum);
        $entityManager->flush();

        return $this->redirectToRoute('referendum_index');
    }

    /**
     * @Route("/new", name="referendum_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $referendum = new Referendum();
        $form = $this->createForm(ReferendumType::class, $referendum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($referendum);
            $entityManager->flush();

            return $this->redirectToRoute('referendum_index');
        }

        return $this->render('referendum/new.html.twig', [
            'referendum' => $referendum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="referendum_show", methods={"GET"})
     */
    public function show(Referendum $referendum): Response
    {
        return $this->render('referendum/show.html.twig', [
            'referendum' => $referendum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="referendum_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Referendum $referendum): Response
    {
        $form = $this->createForm(ReferendumType::class, $referendum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('referendum_index', [
                'id' => $referendum->getId(),
            ]);
        }

        return $this->render('referendum/edit.html.twig', [
            'referendum' => $referendum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="referendum_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Referendum $referendum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$referendum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($referendum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('referendum_index');
    }
}
