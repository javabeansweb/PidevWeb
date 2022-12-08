<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ORM\OneToMany(targetEntity: 'Rendezvous')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSer = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionSer = null;

    #[ORM\Column]
    private ?int $archive = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSer(): ?string
    {
        return $this->nomSer;
    }

    public function setNomSer(string $nomSer): self
    {
        $this->nomSer = $nomSer;

        return $this;
    }

    public function getDescriptionSer(): ?string
    {
        return $this->descriptionSer;
    }

    public function setDescriptionSer(string $descriptionSer): self
    {
        $this->descriptionSer = $descriptionSer;

        return $this;
    }

    public function getArchive(): ?int
    {
        return $this->archive;
    }

    public function setArchive(int $archive): self
    {
        $this->archive = $archive;

        return $this;
    }
}
