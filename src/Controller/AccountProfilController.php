<?php

namespace App\Controller;

use App\Form\ChangeProfilType;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountProfilController extends AbstractController
{
   // pour communiquer avec la bdd on declarre une variable
   private $entityManager;

   public function __construct(EntityManagerInterface $entityManager)
   {
       $this->entityManager=$entityManager;
       
   }

   #[Route('/mon-compte/modifier-mon-profil', name: 'app_account_profil')]
   public function index(Request $request): Response
   
   {  
      $notification = null;
       // on récupère les informationde du user connecter
       $user = $this->getUser();
       // on construit le formulaire avec la méthode creatform 
       $form = $this->createForm(ChangeProfilType::class,$user);
       $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
          $nom =$form->get('nom')->getData();
          $prenom =$form->get('prenom')->getData();
          $cp =$form->get('cp')->getData();
          $tel =$form->get('tel')->getData();
          $ville = $form->get('ville')->getData(); 

          $this->entityManager->persist($user);
          $this->entityManager->flush();
          $notification="votre profil a été mis à jour";

          
        }


  
       // la vue sur laquelle il va retourner le formulaire...
       return $this->render('account/profil.html.twig',[
           'formulaire'=>$form->createView(),
           "notification"=>$notification
       ] );
   }
}
