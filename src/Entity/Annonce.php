<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseDep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Destination;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDep;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlacesDispo;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="annonce")
     */
    private $reservations;



    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseDep(): ?string
    {
        return $this->adresseDep;
    }

    public function setAdresseDep(string $adresseDep): self
    {
        $this->adresseDep = $adresseDep;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->Destination;
    }

    public function setDestination(string $Destination): self
    {
        $this->Destination = $Destination;

        return $this;
    }

    public function getDateHeureDep(): ?\DateTimeInterface
    {
        return $this->dateHeureDep;
    }

    public function setDateHeureDep(\DateTimeInterface $dateHeureDep): self
    {
        $this->dateHeureDep = $dateHeureDep;

        return $this;
    }

    public function getNbPlacesDispo(): ?int
    {
        return $this->nbPlacesDispo;
    }

    public function setNbPlacesDispo(int $nbPlacesDispo): self
    {
        $this->nbPlacesDispo = $nbPlacesDispo;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setAnnonce($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getAnnonce() === $this) {
                $reservation->setAnnonce(null);
            }
        }

        return $this;
    }
}
