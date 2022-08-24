<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountPasswordController extends AbstractController
{ // pour communiquer avec la bdd on declarre une variable
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
        
    }
    #[Route('/compte/modifier-mon-mot-de-passe', name: 'app_account_password')]
    public function index(Request $request,UserPasswordEncoderInterface $encoder): Response
    
    { 
        // on récupère les informationde du user connecter
        $user = $this->getUser();
        // on construit le formulaire avec la méthode creatform 
        $form = $this->createForm(ChangePasswordType::class,$user);
        // pour écouter sur le formulaire a été soumis.
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $old_pwd = $form->get('old_password')->getdata();
        //  pour comparer mot de passe actueul et celui en base de donner crypter
        if($encoder->isPasswordValid($user, $old_pwd)){

            // on va cherche le nouveau mot de passe si celui enregister =celui de la bdd 
          $new_pwd =$form->get('new_password')->getData() ;
          $password = $encoder->encodePassword ($user,$new_pwd);
    // on va dasn user et on modifie l'ancien mot de passe par le nouveau
          $user->setPassword($password);
          $this->entityManager->persist($user);
          $this->entityManager->flush($user);
          $notification ="votre mot de passe a bien été mis a jour.";
        }
          else{
            $notification = "votre mot de passe actuel n'est pas le bon";

          }


        

        }
        // la vue sur laquelle il va retourner le formulaire...
        return $this->render('account/password.html.twig',[
            'formulaire'=>$form->createView(),
            "notification"=>$notification
        ] );
    }
}
