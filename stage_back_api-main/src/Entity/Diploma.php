<?php

namespace App\Entity;

use App\Repository\DiplomaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: DiplomaRepository::class)]
class Diploma
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    #[Assert\Unique()]
    #[Assert\NotBlank()]
    #[Assert\Unique]
    private ?string $label = null;

    #[ORM\OneToMany(mappedBy: 'diploma', targetEntity: EducationalBackground::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $educationalBackgrounds;

    public function __construct()
    {
        $this->educationalBackgrounds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, EducationalBackground>
     */
    public function getEducationalBackgrounds(): Collection
    {
        return $this->educationalBackgrounds;
    }

    public function addEducationalBackground(EducationalBackground $educationalBackground): static
    {
        if (!$this->educationalBackgrounds->contains($educationalBackground)) {
            $this->educationalBackgrounds->add($educationalBackground);
            $educationalBackground->setDiploma($this);
        }

        return $this;
    }

    public function removeEducationalBackground(EducationalBackground $educationalBackground): static
    {
        if ($this->educationalBackgrounds->removeElement($educationalBackground)) {
            // set the owning side to null (unless already changed)
            if ($educationalBackground->getDiploma() === $this) {
                $educationalBackground->setDiploma(null);
            }
        }

        return $this;
    }
}
