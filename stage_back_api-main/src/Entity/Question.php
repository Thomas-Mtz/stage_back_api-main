<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: Answer::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $answers;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: FillBlankQuest::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $fillBlankQuests;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: MultiChoiceQuest::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $multiChoiceQuests;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: OpenQuest::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $openQuests;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?Test $test = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?QuestionType $questionType = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $label = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $content = null;

    #[ORM\OneToOne(mappedBy: 'question', cascade: ['persist', 'remove'])]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?Result $result = null;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->fillBlankQuests = new ArrayCollection();
        $this->multiChoiceQuests = new ArrayCollection();
        $this->openQuests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): static
    {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): static
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FillBlankQuest>
     */
    public function getFillBlankQuests(): Collection
    {
        return $this->fillBlankQuests;
    }

    public function addFillBlankQuest(FillBlankQuest $fillBlankQuest): static
    {
        if (!$this->fillBlankQuests->contains($fillBlankQuest)) {
            $this->fillBlankQuests->add($fillBlankQuest);
            $fillBlankQuest->setQuestion($this);
        }

        return $this;
    }

    public function removeFillBlankQuest(FillBlankQuest $fillBlankQuest): static
    {
        if ($this->fillBlankQuests->removeElement($fillBlankQuest)) {
            // set the owning side to null (unless already changed)
            if ($fillBlankQuest->getQuestion() === $this) {
                $fillBlankQuest->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MultiChoiceQuest>
     */
    public function getMultiChoiceQuests(): Collection
    {
        return $this->multiChoiceQuests;
    }

    public function addMultiChoiceQuest(MultiChoiceQuest $multiChoiceQuest): static
    {
        if (!$this->multiChoiceQuests->contains($multiChoiceQuest)) {
            $this->multiChoiceQuests->add($multiChoiceQuest);
            $multiChoiceQuest->setQuestion($this);
        }

        return $this;
    }

    public function removeMultiChoiceQuest(MultiChoiceQuest $multiChoiceQuest): static
    {
        if ($this->multiChoiceQuests->removeElement($multiChoiceQuest)) {
            // set the owning side to null (unless already changed)
            if ($multiChoiceQuest->getQuestion() === $this) {
                $multiChoiceQuest->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OpenQuest>
     */
    public function getOpenQuests(): Collection
    {
        return $this->openQuests;
    }

    public function addOpenQuest(OpenQuest $openQuest): static
    {
        if (!$this->openQuests->contains($openQuest)) {
            $this->openQuests->add($openQuest);
            $openQuest->setQuestion($this);
        }

        return $this;
    }

    public function removeOpenQuest(OpenQuest $openQuest): static
    {
        if ($this->openQuests->removeElement($openQuest)) {
            // set the owning side to null (unless already changed)
            if ($openQuest->getQuestion() === $this) {
                $openQuest->setQuestion(null);
            }
        }

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(?Test $test): static
    {
        $this->test = $test;

        return $this;
    }

    public function getQuestionType(): ?QuestionType
    {
        return $this->questionType;
    }

    public function setQuestionType(?QuestionType $questionType): static
    {
        $this->questionType = $questionType;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(Result $result): static
    {
        // set the owning side of the relation if necessary
        if ($result->getQuestion() !== $this) {
            $result->setQuestion($this);
        }

        $this->result = $result;

        return $this;
    }
}
