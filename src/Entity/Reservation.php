<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateReserve;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlaceReserve;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="reservations")
     */
    private $annonce;

    /**
     * @ORM\OneToOne(targetEntity=Commentaire::class, cascade={"persist", "remove"})
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Passager::class, inversedBy="reservations")
     */
    private $passager;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReserve(): ?\DateTimeInterface
    {
        return $this->dateReserve;
    }

    public function setDateReserve(\DateTimeInterface $dateReserve): self
    {
        $this->dateReserve = $dateReserve;

        return $this;
    }

    public function getNbPlaceReserve(): ?int
    {
        return $this->nbPlaceReserve;
    }

    public function setNbPlaceReserve(int $nbPlaceReserve): self
    {
        $this->nbPlaceReserve = $nbPlaceReserve;

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

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getCommentaire(): ?Commentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire(?Commentaire $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getPassager(): ?Passager
    {
        return $this->passager;
    }

    public function setPassager(?Passager $passager): self
    {
        $this->passager = $passager;

        return $this;
    }
}
