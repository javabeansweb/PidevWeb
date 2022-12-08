<?php

namespace App\Controller;

use App\Entity\Rendezvous;
use App\Form\RendezvousType;
use App\Repository\RendezvousRepository;
use App\Repository\ServiceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

#[Route('/rendezvouss')]
class RendezvoussController extends AbstractController
{
    #[Route('/', name: 'app_rendezvouss_index', methods: ['GET'])]
    public function index(Request $request,RendezvousRepository $rendezvousRepository,PaginatorInterface $paginator): Response
    {   $data=$rendezvousRepository->findAll();
        $article=$paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            3
        );
        return $this->render('rendezvouss/index.html.twig', [
            'rendezvouses' => $article,
        ]);
    }

    #[Route('/admin', name: 'app_rendezvouss_admin_index', methods: ['GET'])]
    public function index_admin(Request $request,RendezvousRepository $rendezvousRepository, ServiceRepository $serviceRepository,PaginatorInterface $paginator): Response
    {   $data=$rendezvousRepository->findAll();
        $article=$paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            3
        );
        $services =$serviceRepository->findAll();

        $serviceNom = [];
        $serviceCount = [];

        // On "démonte" les données pour les séparer tel qu'attendu par ChartJS
        foreach($services as $service){
            $serviceNom[] = $service->getNomSer();
            $serviceCount[] = count($rendezvousRepository->findBy(array('service'=> $service)));
        }

        return $this->render('rendezvouss/admin_index.html.twig', [
            'rendezvouses' => $article,
            'serviceNom' => json_encode($serviceNom),
            'serviceCount' => json_encode($serviceCount),
        ]);
    }

    #[Route('/stats_admin', name: 'app_stats_admin', methods: ['GET'])]
    public function stats_admin(Request $request,RendezvousRepository $rendezvousRepository, ServiceRepository $serviceRepository): Response
    {
        $services =$serviceRepository->findAll();
        $serviceNom = [];
        $serviceCount = [];
        foreach($services as $service){
            $serviceNom[] = $service->getNomSer();
            $serviceCount[] = count($rendezvousRepository->findBy(array('service'=> $service)));
        }

        return $this->render('rendezvouss/stats.html.twig', [
            'serviceNom' => json_encode($serviceNom),
            'serviceCount' => json_encode($serviceCount),
        ]);
    }


    #[Route('/new', name: 'app_rendezvouss_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RendezvousRepository $rendezvousRepository, ServiceRepository $serviceRepository): Response
    {
        $rendezvou = new Rendezvous();
        $form = $this->createForm(RendezvousType::class, $rendezvou);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rendezvousRepository->save($rendezvou, true);

            return $this->redirectToRoute('app_rendezvouss_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rendezvouss/new.html.twig', [
            'rendezvou' => $rendezvou,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rendezvouss_show', methods: ['GET'])]
    public function show(Rendezvous $rendezvou): Response
    {
        return $this->render('rendezvouss/show.html.twig', [
            'rendezvou' => $rendezvou,
        ]);
    }
    #[Route('/{id}/admin', name: 'app_rendezvouss_admin_show', methods: ['GET'])]
    public function show_admin(Rendezvous $rendezvou): Response
    {
        return $this->render('rendezvouss/admin_show.html.twig', [
            'rendezvou' => $rendezvou,
        ]);
    }
    #[Route('/{id}/edit', name: 'app_rendezvouss_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rendezvous $rendezvou, RendezvousRepository $rendezvousRepository): Response
    {
        $form = $this->createForm(RendezvousType::class, $rendezvou);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rendezvousRepository->save($rendezvou, true);

            return $this->redirectToRoute('app_rendezvouss_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rendezvouss/edit.html.twig', [
            'rendezvou' => $rendezvou,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rendezvouss_delete', methods: ['POST'])]
    public function delete(Request $request, Rendezvous $rendezvou, RendezvousRepository $rendezvousRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rendezvou->getId(), $request->request->get('_token'))) {
            $rendezvousRepository->remove($rendezvou, true);
        }

        return $this->redirectToRoute('app_rendezvouss_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/search/Rendezvous', name: 'search_Rendez_vous', methods: ['GET'])]
    public function searchRendezvousx(Request $request,  RendezvousRepository $ar): Response
    {
        $requestString = $request->get('searchValue');
        return $this->render('rendezvouss/index2.html.twig', [
            'rendezvouses' => $ar->findRendezvous($requestString),
        ]);

    }
}
