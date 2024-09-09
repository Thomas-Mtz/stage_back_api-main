<?php

namespace App\Entity;

use App\Repository\LastExperienceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LastExperienceRepository::class)]
class LastExperience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lastExperiences')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?ProBackground $proBackground = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank()]
    private ?string $year = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Assert\NotBlank()]
    private ?int $duration = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank()]
    private ?string $company = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProBackground(): ?ProBackground
    {
        return $this->proBackground;
    }

    public function setProBackground(?ProBackground $proBackground): static
    {
        $this->proBackground = $proBackground;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): static
    {
        $this->job = $job;

        return $this;
    }
}
