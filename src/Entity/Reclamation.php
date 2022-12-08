<?php

namespace App\Entity;
use App\Entity\Categorie;
use App\Repository\ReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Mapping\AnsiQuoteStrategy;


#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
#[ORM\Index(columns:['id_Categorie'],name:'fk_categorie')]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Categorie::class,inversedBy: 'reclamations')]

    private ?int $id_rec = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname_rec_s = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname_rec_r = null;


    #[ORM\JoinColumn(name:'id_Categorie',referencedColumnName:'id_categorie')]
    #[ORM\ManyToOne(targetEntity: 'Categorie')]
    private Categorie $categorie ;


    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $num_tel = null;

    #[ORM\Column(length: 1500)]
    private ?string $text_rec = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_rec = null;

    public function getId(): ?int
    {
        return $this->id_rec;
    }

    public function getFullnameRecS(): ?string
    {
        return $this->fullname_rec_s;
    }

    public function setFullnameRecS(string $fullname_rec_s): self
    {
        $this->fullname_rec_s = $fullname_rec_s;

        return $this;
    }

    public function getFullnameRecR(): ?string
    {
        return $this->fullname_rec_r;
    }

    public function setFullnameRecR(string $fullname_rec_r): self
    {
        $this->fullname_rec_r = $fullname_rec_r;

        return $this;
    }
/*
    public function getIdCategorie(): ?Categorie
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(?Categorie $id_categorie): self
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }
*/
    /**
     * @return Categorie
     */
    public function getCategorie():Categorie
    {

        return $this->categorie;
    }

    /**
     * @param Categorie $categorie

     */
    public function setCategorie(Categorie $categorie):void
    {
        $this->categorie=$categorie;
    }
    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(string $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getTextRec(): ?string
    {
        return $this->text_rec;
    }

    public function setTextRec(string $text_rec): self
    {
        $this->text_rec = $text_rec;

        return $this;
    }

    public function getDateDeRec(): ?\DateTimeInterface
    {
        return $this->date_de_rec;
    }

    public function setDateDeRec(\DateTimeInterface $date_de_rec): self
    {
        $this->date_de_rec = $date_de_rec;

        return $this;
    }
}
