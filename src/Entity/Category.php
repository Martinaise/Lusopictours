<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Appart::class)]
    private Collection $apparts;

    public function __construct()
    {
        $this->apparts = new ArrayCollection();
    }
    // fonction qui permet de récupérer le nom de cathégory dans la liste deroulante
    public function __toString(){

        return $this->getName();

    }
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

    /**
     * @return Collection<int, Appart>
     */
    public function getApparts(): Collection
    {
        return $this->apparts;
    }

    public function addAppart(Appart $appart): self
    {
        if (!$this->apparts->contains($appart)) {
            $this->apparts->add($appart);
            $appart->setCategory($this);
        }

        return $this;
    }

    public function removeAppart(Appart $appart): self
    {
        if ($this->apparts->removeElement($appart)) {
            // set the owning side to null (unless already changed)
            if ($appart->getCategory() === $this) {
                $appart->setCategory(null);
            }
        }

        return $this;
    }
}
