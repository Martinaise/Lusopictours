<?php

namespace App\Entity;

use App\Repository\AppartRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartRepository::class)]
class Appart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $cp = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $prix_journalier = null;

    #[ORM\Column]
    private ?int $nb_personne = null;

    #[ORM\Column]
    private ?int $nb_chambre = null;

    #[ORM\Column]
    private ?int $nb_coucharge = null;

    #[ORM\Column(length: 255)]
    private ?string $vues_panoramiques = null;

    #[ORM\Column(length: 255)]
    private ?string $salle_bain = null;

    #[ORM\Column(length: 255)]
    private ?string $chambre_linge = null;

    #[ORM\Column(length: 255)]
    private ?string $divertissement = null;

    #[ORM\Column(length: 255)]
    private ?string $famille = null;

    #[ORM\Column(length: 255)]
    private ?string $chauffage_climatisation = null;

    #[ORM\Column(length: 255)]
    private ?string $securite_maison = null;

    #[ORM\Column(length: 255)]
    private ?string $internet_bureau = null;

    #[ORM\Column(length: 255)]
    private ?string $cuisine_salle_manger = null;

    #[ORM\Column(length: 255)]
    private ?string $carateriques_emplacement = null;

    #[ORM\Column(length: 255)]
    private ?string $exterieur = null;

    #[ORM\Column(length: 255)]
    private ?string $parking_installations = null;

    #[ORM\Column(length: 255)]
    private ?string $services = null;

    #[ORM\ManyToOne(inversedBy: 'apparts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixJournalier(): ?int
    {
        return $this->prix_journalier;
    }

    public function setPrixJournalier(int $prix_journalier): self
    {
        $this->prix_journalier = $prix_journalier;

        return $this;
    }

    public function getNbPersonne(): ?int
    {
        return $this->nb_personne;
    }

    public function setNbPersonne(int $nb_personne): self
    {
        $this->nb_personne = $nb_personne;

        return $this;
    }

    public function getNbChambre(): ?int
    {
        return $this->nb_chambre;
    }

    public function setNbChambre(int $nb_chambre): self
    {
        $this->nb_chambre = $nb_chambre;

        return $this;
    }

    public function getNbCoucharge(): ?int
    {
        return $this->nb_coucharge;
    }

    public function setNbCoucharge(int $nb_coucharge): self
    {
        $this->nb_coucharge = $nb_coucharge;

        return $this;
    }

    public function getVuesPanoramiques(): ?string
    {
        return $this->vues_panoramiques;
    }

    public function setVuesPanoramiques(string $vues_panoramiques): self
    {
        $this->vues_panoramiques = $vues_panoramiques;

        return $this;
    }

    public function getSalleBain(): ?string
    {
        return $this->salle_bain;
    }

    public function setSalleBain(string $salle_bain): self
    {
        $this->salle_bain = $salle_bain;

        return $this;
    }

    public function getChambreLinge(): ?string
    {
        return $this->chambre_linge;
    }

    public function setChambreLinge(string $chambre_linge): self
    {
        $this->chambre_linge = $chambre_linge;

        return $this;
    }

    public function getDivertissement(): ?string
    {
        return $this->divertissement;
    }

    public function setDivertissement(string $divertissement): self
    {
        $this->divertissement = $divertissement;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getChauffageClimatisation(): ?string
    {
        return $this->chauffage_climatisation;
    }

    public function setChauffageClimatisation(string $chauffage_climatisation): self
    {
        $this->chauffage_climatisation = $chauffage_climatisation;

        return $this;
    }

    public function getSecuriteMaison(): ?string
    {
        return $this->securite_maison;
    }

    public function setSecuriteMaison(string $securite_maison): self
    {
        $this->securite_maison = $securite_maison;

        return $this;
    }

    public function getInternetBureau(): ?string
    {
        return $this->internet_bureau;
    }

    public function setInternetBureau(string $internet_bureau): self
    {
        $this->internet_bureau = $internet_bureau;

        return $this;
    }

    public function getCuisineSalleManger(): ?string
    {
        return $this->cuisine_salle_manger;
    }

    public function setCuisineSalleManger(string $cuisine_salle_manger): self
    {
        $this->cuisine_salle_manger = $cuisine_salle_manger;

        return $this;
    }

    public function getCarateriquesEmplacement(): ?string
    {
        return $this->carateriques_emplacement;
    }

    public function setCarateriquesEmplacement(string $carateriques_emplacement): self
    {
        $this->carateriques_emplacement = $carateriques_emplacement;

        return $this;
    }

    public function getExterieur(): ?string
    {
        return $this->exterieur;
    }

    public function setExterieur(string $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    public function getParkingInstallations(): ?string
    {
        return $this->parking_installations;
    }

    public function setParkingInstallations(string $parking_installations): self
    {
        $this->parking_installations = $parking_installations;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(string $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
