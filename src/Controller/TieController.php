<?php

namespace App\Controller;

use App\Entity\Tie;
use App\Form\TieType;
use App\Repository\TieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tie")
 */
class TieController extends AbstractController
{
    /**
     * @Route("/", name="tie_index", methods={"GET"})
     */
    public function index(TieRepository $tieRepository): Response
    {
        return $this->render('tie/index.html.twig', [
            'ties' => $tieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tie = new Tie();
        $form = $this->createForm(TieType::class, $tie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tie);
            $entityManager->flush();

            return $this->redirectToRoute('tie_index');
        }

        return $this->render('tie/new.html.twig', [
            'tie' => $tie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tie_show", methods={"GET"})
     */
    public function show(Tie $tie): Response
    {
        return $this->render('tie/show.html.twig', [
            'tie' => $tie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tie $tie): Response
    {
        $form = $this->createForm(TieType::class, $tie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tie_index');
        }

        return $this->render('tie/edit.html.twig', [
            'tie' => $tie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tie_delete", methods={"POST"})
     */
    public function delete(Request $request, Tie $tie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tie_index');
    }
}
