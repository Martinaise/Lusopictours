<?php

namespace App\Controller;

use App\Entity\Appart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppartController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
        
    }

    #[Route('/nos-residences', name: 'app_appart')]
    public function index(): Response
    { 
        // recup tous les  pparts avec (findAll)
         $apparts=$this->entityManager->getRepository(Appart::class)->findAll();

        return $this->render('appart/index.html.twig', [
            'apparts' => $apparts,
        ]);
    }
    // pour creer une fonction qui va montrer le détails d'un appart
    // On recupère le slug ce slug permet de chercher les infos dans la bdd en fonction du slug
    #[Route("/detail-residence/{slug}", name: 'app_detail_appart')]
    public function show($slug): Response
    { 
        // dd($slug);
        // en ce bassant sur le slug on va récupéré un seule appart(avec findOneBySlug )
         $appart=$this->entityManager->getRepository(Appart::class)->findOneBySlug($slug);
        //   (!)appat= si il ya rien dans appart
         if(!$appart){
            return $this->redirectToRoute('app_appart');
         }
        return $this->render('appart/show.html.twig', [
            'appart' => $appart,
        ]);
    }

    
}
