<?php

namespace App\Controller;

use App\Entity\Planing;
use App\Form\PlaningType;
use App\Repository\PlaningRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/planings')]
class PlaningsController extends AbstractController
{
    #[Route('/', name: 'app_planings_index', methods: ['GET'])]
    public function index(PlaningRepository $planingRepository): Response
    {
        $planings = $planingRepository->findAll();
        return $this->render('planings/index.html.twig', [
            'planings'=>$planings,
        ]);
    }
    #[Route('/admin', name: 'app_planings_admin_index', methods: ['GET'])]
    public function admin_index(PlaningRepository $planingRepository): Response
    {
        return $this->render('planings/admin_index.html.twig', [
            'planings' => $planingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_planings_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PlaningRepository $planingRepository, UserRepository $userRepository): Response
    {
        $planing = new Planing();
        $user=$userRepository->find(1);
        $form = $this->createForm(PlaningType::class, $planing);

        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            $planing->setUser($user);
            $planingRepository->save($planing, true);
            return $this->redirectToRoute('app_planings_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('planings/new.html.twig', [
            'planing' => $planing,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_planings_show', methods: ['GET'])]
    public function show(Planing $planing): Response
    {
        return $this->render('planings/show.html.twig', [
            'planing' => $planing,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_planings_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Planing $planing, PlaningRepository $planingRepository): Response
    {
        $form = $this->createForm(PlaningType::class, $planing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $planingRepository->save($planing, true);

            return $this->redirectToRoute('app_planings_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('planings/edit.html.twig', [
            'planing' => $planing,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_planings_delete', methods: ['POST'])]
    public function delete(Request $request, Planing $planing, PlaningRepository $planingRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planing->getId(), $request->request->get('_token'))) {
            $planingRepository->remove($planing, true);
        }

        return $this->redirectToRoute('app_planings_index', [], Response::HTTP_SEE_OTHER);
    }

    //partie client





}
