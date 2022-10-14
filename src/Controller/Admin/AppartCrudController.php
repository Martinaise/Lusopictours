<?php

namespace App\Controller\Admin;

use App\Entity\Appart;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AppartCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Appart::class;
    }

    //  on decommente cette partie pour faire  apparaitre les lignes de configureFields et on suprimme le retourne de base
    public function configureFields(string $pageName): iterable
    {
        //    on indique a easyadmin les input a afficher et sur quel format
        return [
            TextField::new('name', "votre nom"),
            //enlève tous les caractères dans url pour le rendre plus jolie
            SlugField::new('slug')->setTargetFieldName('name'),
            TextField::new('adresse'),
            TextField::new('ville'),
            TextField::new('cp'),
            TextField::new('pays'),
            // pour chargé une image depuis la machine
            ImageField::new('image')
            // pour montrer le chemein d'accès de l'image
                ->setBasePath('img')
                // pour montrer le chemin complet de l'emplacement de l'image 
                ->setUploadDir('/public/img')
                //renommer l'image après le télechargement et ajouter son extention de base
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
            TextareaField::new('description'),
            MoneyField::new('prix_journalier')->setCurrency('EUR'),
            IntegerField::new('nb_personne'),
            IntegerField::new('nb_chambre'),
            IntegerField::new('nb_coucharge'),
            TextField::new('vues_panoramiques'),
            TextField::new('salle_bain'),
            TextField::new('chambre_linge'),
            TextField::new('divertissement'),
            TextField::new('famille'),
            TextField::new('chauffage_climatisation'),
            TextField::new('securite_maison'),
            TextField::new('internet_bureau'),
            TextField::new('cuisine_salle_manger'),
            TextField::new('carateriques_emplacement'),
            TextField::new('carateriques_emplacement'),
            TextField::new('carateriques_emplacement'),
            TextField::new('exterieur'),
            TextField::new('parking_installations'),
            TextField::new('services'),
            AssociationField::new('category'),


        ];
    }
}
