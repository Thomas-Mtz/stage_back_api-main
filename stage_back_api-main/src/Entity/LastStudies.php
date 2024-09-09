<?php

namespace App\Entity;

use App\Repository\LastStudiesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LastStudiesRepository::class)]
class LastStudies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lastStudies')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?EducationalBackground $educationalBackground = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank()]
    private ?string $year = null;

    #[ORM\Column(length: 120)]
    #[Assert\NotBlank()]
    private ?string $class = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $certification = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $school = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationalBackground(): ?EducationalBackground
    {
        return $this->educationalBackground;
    }

    public function setEducationalBackground(?EducationalBackground $educationalBackground): static
    {
        $this->educationalBackground = $educationalBackground;

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

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): static
    {
        $this->class = $class;

        return $this;
    }

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): static
    {
        $this->certification = $certification;

        return $this;
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(string $school): static
    {
        $this->school = $school;

        return $this;
    }
}
