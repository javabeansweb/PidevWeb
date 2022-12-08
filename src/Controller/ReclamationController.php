<?php

namespace App\Controller;

use App\Class\Search;
use App\Entity\Reclamation;
use App\Entity\Mail;
use App\Form\ReclamationType;
use App\Form\SearchType;
use App\Repository\CategorieRepository;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reclamation')]
class ReclamationController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager=$entityManager;
    }

    #[Route('/showw', name: 'app_reclamation', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $reclamation = $this->entityManager->getRepository(Reclamation::class)->findAll();
        $search= new Search();
        $form=$this->createForm(SearchType::class,$search);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $reclamation = $this->entityManager->getRepository(Reclamation::class)->findwithSearch($search);

        }
        return $this->render('reclamation/index.html.twig', [
            'reclamations'=>$reclamation,

            'form'=>$form->createView()
        ]);
    }

    #[Route('/new', name: 'app_reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReclamationRepository $reclamationRepository,CategorieRepository $categorieRepository): Response
    {
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reclamationRepository->save($reclamation, true);
            $mail = new Mail();
            $content="Bonjour ".$reclamation->getFullnameRecS()."<br/>Bienvenue sur UpServe.<br><br/>Nous avons bien reçu votre réclamation. Nous sommes sincèrement désolés pour ce désagrément. Nous mettons tout en œuvre pour résoudre ce problème au plus vite ";
        $mail->send($reclamation->getMail(),$reclamation->getFullnameRecS(),'mon premier mail',$content);

            return $this->redirectToRoute('app_reclamation', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reclamation/new.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_show', methods: ['GET'])]
    public function show(Reclamation $reclamation): Response
    {
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }
    ///search
    #[Route('/filtrage', name: 'app_reclamation_filtrer', methods: ['GET'])]
    public function indexx(ReclamationRepository $reclamationRepository): Response
    {
        return $this->render('reclamation/search.html.twig');
    }


    ////////stat
    #[Route('/stat/s/s', name: 'app_reclamation_stat', methods: ['GET'])]
    public function statistiques(ReclamationRepository $reclamationRepository): Response
    {
       // $ca=$reclamationRepository->countAvis();

        $cf=$reclamationRepository->countfeedback();

       // $cs=$reclamationRepository->countMauvaisService();

        return $this->render('statistique.html.twig', [

            //'ca'=>$ca,
            'cf'=>$cf,
            //'cs'=>$cs,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, ReclamationRepository $reclamationRepository): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reclamationRepository->save($reclamation, true);

            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, ReclamationRepository $reclamationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reclamation->getId(), $request->request->get('_token'))) {
            $reclamationRepository->remove($reclamation, true);
        }

        return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
    }
}
