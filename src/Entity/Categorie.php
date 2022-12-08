<?php

namespace App\Entity;
use App\Entity\Reclamation;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\AnsiQuoteStrategy;



#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ORM\OneToMany(targetEntity: 'Reclamation')]
    private ?int $idCategorie = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCategorie = null;



    public function getId(): ?int
    {
        return $this->idCategorie;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomCategorie;
    }


}
