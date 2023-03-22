<?php

namespace App\Controller;

use App\Entity\Passager;
use App\Form\PassagerType;
use App\Repository\PassagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/passager")
 */
class PassagerController extends AbstractController
{
    /**
     * @Route("/", name="app_passager_index", methods={"GET"})
     */
    public function index(PassagerRepository $passagerRepository): Response
    {
        return $this->render('passager/index.html.twig', [
            'passagers' => $passagerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_passager_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PassagerRepository $passagerRepository): Response
    {
        $passager = new Passager();
        $form = $this->createForm(PassagerType::class, $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passagerRepository->add($passager);
            return $this->redirectToRoute('app_passager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('passager/new.html.twig', [
            'passager' => $passager,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_passager_show", methods={"GET"})
     */
    public function show(Passager $passager): Response
    {
        return $this->render('passager/show.html.twig', [
            'passager' => $passager,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_passager_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Passager $passager, PassagerRepository $passagerRepository): Response
    {
        $form = $this->createForm(PassagerType::class, $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passagerRepository->add($passager);
            return $this->redirectToRoute('app_passager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('passager/edit.html.twig', [
            'passager' => $passager,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_passager_delete", methods={"POST"})
     */
    public function delete(Request $request, Passager $passager, PassagerRepository $passagerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$passager->getId(), $request->request->get('_token'))) {
            $passagerRepository->remove($passager);
        }

        return $this->redirectToRoute('app_passager_index', [], Response::HTTP_SEE_OTHER);
    }
}
