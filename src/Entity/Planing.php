<?php

namespace App\Entity;

use App\Repository\PlaningRepository;
use App\Entity\Rendezvous;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlaningRepository::class)]
#[ORM\Table(name:'planing')]
#[ORM\Index(columns: ['id_user'], name: 'fk_user')]
class Planing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id ;
    /**
     * Many Planings have Many Rendezvouss.
     * @var Collection<int, Rendezvous>
     */
    #[JoinTable(name: 'planings_rendezvouss')]
    #[JoinColumn(name: 'planing_id', referencedColumnName: 'id')]
    #[InverseJoinColumn(name: 'rendezvous_id', referencedColumnName: 'id', unique: true)]
    #[ManyToMany(targetEntity: 'Rendezvous')]
    private Collection $rendezvouss;

    public function __construct()
    {
        $this->rendezvouss = new ArrayCollection();
    }

    #[ORM\JoinColumn(name:'id_user',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: 'User')]
    private \App\Entity\User $user;




    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection
     */
    public function getRendezvouss(): Collection
    {
        return $this->rendezvouss;
    }

    /**
     * @param Collection $rendezvouss
     */
    public function setRendezvouss(Collection $rendezvouss): void
    {
        $this->rendezvouss = $rendezvouss;
    }

}
