<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'session', targetEntity: Exam::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $exams;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?TrainingTrainingCenter $trainingTrainingCenter = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank()]
    private ?string $label = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\NotBlank()]
    private ?\DateTimeImmutable $starting_at = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\NotBlank()]
    private ?\DateTimeImmutable $ending_at = null;

    public function __construct()
    {
        $this->exams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Exam>
     */
    public function getExams(): Collection
    {
        return $this->exams;
    }

    public function addExam(Exam $exam): static
    {
        if (!$this->exams->contains($exam)) {
            $this->exams->add($exam);
            $exam->setSession($this);
        }

        return $this;
    }

    public function removeExam(Exam $exam): static
    {
        if ($this->exams->removeElement($exam)) {
            // set the owning side to null (unless already changed)
            if ($exam->getSession() === $this) {
                $exam->setSession(null);
            }
        }

        return $this;
    }

    public function getTrainingTrainingCenter(): ?TrainingTrainingCenter
    {
        return $this->trainingTrainingCenter;
    }

    public function setTrainingTrainingCenter(?TrainingTrainingCenter $trainingTrainingCenter): static
    {
        $this->trainingTrainingCenter = $trainingTrainingCenter;

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

    public function getStartingAt(): ?\DateTimeImmutable
    {
        return $this->starting_at;
    }

    public function setStartingAt(\DateTimeImmutable $starting_at): static
    {
        $this->starting_at = $starting_at;

        return $this;
    }

    public function getEndingAt(): ?\DateTimeImmutable
    {
        return $this->ending_at;
    }

    public function setEndingAt(\DateTimeImmutable $ending_at): static
    {
        $this->ending_at = $ending_at;

        return $this;
    }
}
