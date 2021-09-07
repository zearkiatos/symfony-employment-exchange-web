<?php

namespace App\Entity;

use App\Repository\ApplicantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicantRepository::class)
 */
class Applicant
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
    private $name;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $offers = [];

    private $user;

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
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

    public function getOffers(): ?array
    {
        return $this->offers;
    }

    public function setOffers(?array $offers): self
    {
        $this->offers = $offers;

        return $this;
    }
}
