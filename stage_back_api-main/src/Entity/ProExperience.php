<?php

namespace App\Entity;

use App\Repository\ProExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProExperienceRepository::class)]
class ProExperience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'ProExperience', targetEntity: ProBackground::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $proBackgrounds;

    #[ORM\Column(length: 60)]
    #[Assert\NotBlank()]
    #[Assert\Unique()]
    private ?string $label = null;

    public function __construct()
    {
        $this->proBackgrounds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ProBackground>
     */
    public function getProBackgrounds(): Collection
    {
        return $this->proBackgrounds;
    }

    public function addProBackground(ProBackground $proBackground): static
    {
        if (!$this->proBackgrounds->contains($proBackground)) {
            $this->proBackgrounds->add($proBackground);
            $proBackground->setProExperience($this);
        }

        return $this;
    }

    public function removeProBackground(ProBackground $proBackground): static
    {
        if ($this->proBackgrounds->removeElement($proBackground)) {
            // set the owning side to null (unless already changed)
            if ($proBackground->getProExperience() === $this) {
                $proBackground->setProExperience(null);
            }
        }

        return $this;
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
}
