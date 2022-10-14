<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    // pour communiquer avec la bdd on declarre une variable
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
        
    }
    #[Route('/inscription', name: 'app_register')]
    public function index(Request $request,UserPasswordEncoderInterface $encoder): Response
    {
        $notification = null;

        $user=new User();
        $form = $this->createform(RegisterType::class,$user);
        // soummison du formulaire
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user=$form->getData();
            // encoder le mot de passe (=crypter)
            $password = $encoder->encodePassword($user,$user->getPassword());
            // mettre le nouveau mot de passe crypter
             $user->setPassword($password);
            //  envoyer le nouveau utilisateur dans la bdd
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $notification ="votre inscription est pris en compte.";
        }

        return $this->render('register/index.html.twig',[
            'formulaire'=> $form->createView(),
            "notification"=>$notification
        ] );
    }
}
