<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{

    #[Route('/inscription', name: 'app_register')]
    public function index(Request $request,\Swift_Mailer $mailer
        ,UserRepository $userRepository,UserPasswordHasherInterface $hasher) :Response
    {


        $user= new User();
        $form =$this->createForm(RegisterType::class,$user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();
            $password=$hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($password);
$d=$form->getData();
$c=$d->getEmail();
            $user->setRoles(array('ROLE_USER'));
            $userRepository->save($user, true);
            $message = (new \Swift_Message('compte créer'))
                ->setFrom('nadhir.baatout@esprit.tn')
                ->setTo($c)
                ->setBody(
                    ' votre compte est crée avec success', 'text/html'
                );
            $mailer->send($message);
            return $this->redirectToRoute('app_login');
        }
        return $this->render('register/index.html.twig',[
            'form'=>$form->createView()
        ]);
    }
    #[Route('/show', name: 'app_showadmin')]
    public function showadmin(UserRepository $userRepository){
         $user=$userRepository->findAll();
         return $this->render('user/index.html.twig',[
             'users'=>$user
         ]);
}
}
