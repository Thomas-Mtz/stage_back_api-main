<?php

namespace App\Entity;

use App\Repository\FillBlankQuestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FillBlankQuestRepository::class)]
class FillBlankQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fillBlankQuests')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?Question $question = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $expected_value = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Assert\NotBlank()]
    private ?int $blank_idx = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getExpectedValue(): ?string
    {
        return $this->expected_value;
    }

    public function setExpectedValue(string $expected_value): static
    {
        $this->expected_value = $expected_value;

        return $this;
    }

    public function getBlankIdx(): ?int
    {
        return $this->blank_idx;
    }

    public function setBlankIdx(int $blank_idx): static
    {
        $this->blank_idx = $blank_idx;

        return $this;
    }
}
