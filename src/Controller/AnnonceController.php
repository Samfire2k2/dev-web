<?php

namespace App\Controller;

use App\Entity\Passager;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/{_locale}/annonce")
 */
class AnnonceController extends AbstractController
{
    /**
     * @Route("/", name="app_annonce_index", methods={"GET"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param Security $security
     * @return RedirectResponse|Response
     * Require ROLE_ADMIN for  method create in this class
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/list", name="app_annonce_a_venir", methods={"GET"})
     */
    public function indexUser(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonceRepository->getAnnoncesNonExpirees(),
        ]);
    }

    /**
     * @Route("/critere", name="app_annonce_search", methods={"GET", "POST"})
     */
    public function RechercheVilleDep(Request $request, AnnonceRepository $annonceRepository): Response
{
    $villeDep = $request->query->get('villeDep');
    $Destination = $request->query->get('Destination');
    $annonces = $annonceRepository->getVilleDep($villeDep, $Destination);
    return $this->render('annonce/index.html.twig', [
        'annonces' => $annonces,
    ]);
}
    /**
     * @Route("/new", name="app_annonce_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AnnonceRepository $annonceRepository): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonceRepository->add($annonce);
            return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annonce/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_annonce_show", methods={"GET"})
     */
    public function show(Annonce $annonce): Response
    {
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_annonce_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Annonce $annonce, AnnonceRepository $annonceRepository): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonceRepository->add($annonce);
            return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annonce/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_annonce_delete", methods={"POST"})
     */
    public function delete(Request $request, Annonce $annonce, AnnonceRepository $annonceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            $annonceRepository->remove($annonce);
        }

        return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
    }
}
