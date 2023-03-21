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
}
