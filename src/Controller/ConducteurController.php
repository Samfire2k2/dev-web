<?php

namespace App\Controller;

use App\Entity\Conducteur;
use App\Form\ConducteurType;
use App\Repository\ConducteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/conducteur")
 */
class ConducteurController extends AbstractController
{
    /**
     * @Route("/", name="app_conducteur_index", methods={"GET"})
     */
    public function index(ConducteurRepository $conducteurRepository): Response
    {
        return $this->render('conducteur/index.html.twig', [
            'conducteurs' => $conducteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_conducteur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ConducteurRepository $conducteurRepository): Response
    {
        $conducteur = new Conducteur();
        $form = $this->createForm(ConducteurType::class, $conducteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $conducteurRepository->add($conducteur);
            return $this->redirectToRoute('app_conducteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('conducteur/new.html.twig', [
            'conducteur' => $conducteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_conducteur_show", methods={"GET"})
     */
    public function show(Conducteur $conducteur): Response
    {
        return $this->render('conducteur/show.html.twig', [
            'conducteur' => $conducteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_conducteur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Conducteur $conducteur, ConducteurRepository $conducteurRepository): Response
    {
        $form = $this->createForm(ConducteurType::class, $conducteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $conducteurRepository->add($conducteur);
            return $this->redirectToRoute('app_conducteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('conducteur/edit.html.twig', [
            'conducteur' => $conducteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_conducteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Conducteur $conducteur, ConducteurRepository $conducteurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conducteur->getId(), $request->request->get('_token'))) {
            $conducteurRepository->remove($conducteur);
        }

        return $this->redirectToRoute('app_conducteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
