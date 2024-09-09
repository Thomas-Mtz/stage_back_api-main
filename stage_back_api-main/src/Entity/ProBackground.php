<?php

namespace App\Entity;

use App\Repository\ProBackgroundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProBackgroundRepository::class)]
class ProBackground
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'proBackground', targetEntity: LastExperience::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $lastExperiences;

    #[ORM\ManyToOne(inversedBy: 'proBackgrounds')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?ProExperience $ProExperience = null;

    #[ORM\OneToOne(inversedBy: 'proBackground', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?User $user = null;

    public function __construct()
    {
        $this->lastExperiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, LastExperience>
     */
    public function getLastExperiences(): Collection
    {
        return $this->lastExperiences;
    }

    public function addLastExperience(LastExperience $lastExperience): static
    {
        if (!$this->lastExperiences->contains($lastExperience)) {
            $this->lastExperiences->add($lastExperience);
            $lastExperience->setProBackground($this);
        }

        return $this;
    }

    public function removeLastExperience(LastExperience $lastExperience): static
    {
        if ($this->lastExperiences->removeElement($lastExperience)) {
            // set the owning side to null (unless already changed)
            if ($lastExperience->getProBackground() === $this) {
                $lastExperience->setProBackground(null);
            }
        }

        return $this;
    }

    public function getProExperience(): ?ProExperience
    {
        return $this->ProExperience;
    }

    public function setProExperience(?ProExperience $ProExperience): static
    {
        $this->ProExperience = $ProExperience;

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

}
