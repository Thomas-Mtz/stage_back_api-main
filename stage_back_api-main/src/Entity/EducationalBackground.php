<?php

namespace App\Entity;

use App\Repository\EducationnalBackgroundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EducationnalBackgroundRepository::class)]
class EducationalBackground
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'educationalBackgrounds')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?Diploma $diploma = null;

    #[ORM\OneToOne(inversedBy: 'educationalBackground', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'educationalBackground', targetEntity: LastStudies::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $lastStudies;

    public function __construct()
    {
        $this->lastStudies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiploma(): ?Diploma
    {
        return $this->diploma;
    }

    public function setDiploma(?Diploma $diploma): static
    {
        $this->diploma = $diploma;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, LastStudies>
     */
    public function getLastStudies(): Collection
    {
        return $this->lastStudies;
    }

    public function addLastStudy(LastStudies $lastStudy): static
    {
        if (!$this->lastStudies->contains($lastStudy)) {
            $this->lastStudies->add($lastStudy);
            $lastStudy->setEducationalBackground($this);
        }

        return $this;
    }

    public function removeLastStudy(LastStudies $lastStudy): static
    {
        if ($this->lastStudies->removeElement($lastStudy)) {
            // set the owning side to null (unless already changed)
            if ($lastStudy->getEducationalBackground() === $this) {
                $lastStudy->setEducationalBackground(null);
            }
        }

        return $this;
    }

}
