<?php

namespace App\Entity;

use App\Repository\TrainingTrainingCenterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrainingTrainingCenterRepository::class)]
#[ORM\UniqueConstraint(
    columns: ['training_id', 'training_center_id']
  )]
class TrainingTrainingCenter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'trainingTrainingCenter', targetEntity: Session::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $sessions;

    #[ORM\ManyToOne(inversedBy: 'trainingTrainingCenters')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?Training $training = null;

    #[ORM\ManyToOne(inversedBy: 'trainingTrainingCenters')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?TrainingCenter $training_center = null;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): static
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setTrainingTrainingCenter($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getTrainingTrainingCenter() === $this) {
                $session->setTrainingTrainingCenter(null);
            }
        }

        return $this;
    }

    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(?Training $training): static
    {
        $this->training = $training;

        return $this;
    }

    public function getTrainingCenter(): ?TrainingCenter
    {
        return $this->training_center;
    }

    public function setTrainingCenter(?TrainingCenter $training_center): static
    {
        $this->training_center = $training_center;

        return $this;
    }
}
