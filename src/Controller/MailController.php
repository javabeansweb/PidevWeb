<?php

namespace App\Controller;

use App\Entity\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    #[Route('/mail', name: 'app_mail')]
    public function index()
    {
         return $this->render('app_reclamation_index',[],Response::HTTP_SEE_OTHER);
    }
}
