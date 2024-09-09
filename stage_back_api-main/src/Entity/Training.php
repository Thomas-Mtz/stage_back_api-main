<?php

namespace App\Entity;

use App\Repository\TrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrainingRepository::class)]
class Training
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'training', targetEntity: TrainingTrainingCenter::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $trainingTrainingCenters;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank()]
    #[Assert\Unique()]
    private ?string $label = null;

    public function __construct()
    {
        $this->trainingTrainingCenters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, TrainingTrainingCenter>
     */
    public function getTrainingTrainingCenters(): Collection
    {
        return $this->trainingTrainingCenters;
    }

    public function addTrainingTrainingCenter(TrainingTrainingCenter $trainingTrainingCenter): static
    {
        if (!$this->trainingTrainingCenters->contains($trainingTrainingCenter)) {
            $this->trainingTrainingCenters->add($trainingTrainingCenter);
            $trainingTrainingCenter->setTraining($this);
        }

        return $this;
    }

    public function removeTrainingTrainingCenter(TrainingTrainingCenter $trainingTrainingCenter): static
    {
        if ($this->trainingTrainingCenters->removeElement($trainingTrainingCenter)) {
            // set the owning side to null (unless already changed)
            if ($trainingTrainingCenter->getTraining() === $this) {
                $trainingTrainingCenter->setTraining(null);
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
