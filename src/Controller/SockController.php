<?php

namespace App\Controller;

use App\Entity\Sock;
use App\Form\SockType;
use App\Repository\SockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sock")
 */
class SockController extends AbstractController
{
    /**
     * @Route("/", name="sock_index", methods={"GET"})
     */
    public function index(SockRepository $sockRepository): Response
    {
        return $this->render('sock/index.html.twig', [
            'socks' => $sockRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sock_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sock = new Sock();
        $form = $this->createForm(SockType::class, $sock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sock);
            $entityManager->flush();

            return $this->redirectToRoute('sock_index');
        }

        return $this->render('sock/new.html.twig', [
            'sock' => $sock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sock_show", methods={"GET"})
     */
    public function show(Sock $sock): Response
    {
        return $this->render('sock/show.html.twig', [
            'sock' => $sock,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sock_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sock $sock): Response
    {
        $form = $this->createForm(SockType::class, $sock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sock_index');
        }

        return $this->render('sock/edit.html.twig', [
            'sock' => $sock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sock_delete", methods={"POST"})
     */
    public function delete(Request $request, Sock $sock): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sock->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sock_index');
    }
}
