<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/compte', name: 'account')]
    public function index(): Response
    {
        return $this->render('account/index.html.twig');
    }
    #[Route('/admin', name: 'display_admin')]

    public function indexAdmin(): Response
    {

        return $this->render('admin/index.html.twig'
        );
    }
    #[Route('/client/{id}', name: 'deleteclient')]
    public function deleteeclient(Request $request, User $utilisateur,ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($utilisateur);
        $em->flush();
        return $this->redirectToRoute('app_showadmin');
    }

    //***********************************Client Start***********************************************************//

      #[Route("/client", name:'display_client')]

    public function indexClient(): Response
    {

        return $this->render('client/index.html.twig');
    }

    //***********************************Client End***********************************************************//
}
