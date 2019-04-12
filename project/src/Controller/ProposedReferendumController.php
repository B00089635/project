<?php

namespace App\Controller;

use App\Entity\ProposedReferendum;
use App\Form\ProposedReferendumType;
use App\Repository\ProposedReferendumRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/proposedreferendum")
 * @IsGranted("ROLE_STUDENT")
 */
class ProposedReferendumController extends AbstractController
{
    /**
     * @Route("/", name="proposed_referendum_index", methods={"GET"})
     */
    public function index(ProposedReferendumRepository $proposedReferendumRepository): Response
    {
        return $this->render('proposed_referendum/index.html.twig', [
            'proposed_referendums' => $proposedReferendumRepository->findAll(),
        ]);
    }

    /**
     * @Route("/support/{id}", name="proposed_referendum_support", methods={"POST"})
     */
    public function support(Request $request, ProposedReferendumRepository $proposedReferendumRepository){
        $proposedReferendum = $proposedReferendumRepository->find($request->request->get('proposal_id'));

        $support = $proposedReferendum->getSupport();
        $proposedReferendum->setSupport($support + 1);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($proposedReferendum);
        $entityManager->flush();

        return $this->redirectToRoute('proposed_referendum_index');
    }

    /**
     * @Route("/new", name="proposed_referendum_new", methods={"GET","POST"})
     */
    public function new(Request $request,ObjectManager $manager): Response
    {
        $proposedReferendum = new ProposedReferendum();
        $form = $this->createForm(ProposedReferendumType::class, $proposedReferendum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $roles = $this->getUser()->getUsername();
            $details = $proposedReferendum->getDetails();
            $support = 0;

            $proposal = new ProposedReferendum();
            $proposal->setUser($user);
            $proposal->setDetails($details);
            $proposal->setSupport($support);

            $manager->persist($proposal);
            $manager->flush();

            return $this->redirectToRoute('proposed_referendum_index');
        }

        return $this->render('proposed_referendum/new.html.twig', [
            'proposed_referendum' => $proposedReferendum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proposed_referendum_show", methods={"GET"})
     */
    public function show(ProposedReferendum $proposedReferendum): Response
    {
        return $this->render('proposed_referendum/show.html.twig', [
            'proposed_referendum' => $proposedReferendum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proposed_referendum_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProposedReferendum $proposedReferendum): Response
    {
        $form = $this->createForm(ProposedReferendumType::class, $proposedReferendum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proposed_referendum_index', [
                'id' => $proposedReferendum->getId(),
            ]);
        }

        return $this->render('proposed_referendum/edit.html.twig', [
            'proposed_referendum' => $proposedReferendum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proposed_referendum_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProposedReferendum $proposedReferendum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proposedReferendum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proposedReferendum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proposed_referendum_index');
    }
}
