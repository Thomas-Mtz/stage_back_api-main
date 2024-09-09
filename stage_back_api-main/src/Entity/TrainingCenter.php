<?php

namespace App\Entity;

use App\Repository\TrainingCenterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrainingCenterRepository::class)]
class TrainingCenter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    #[Assert\NotBlank()]
    private ?string $city = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank()]
    private ?string $postcode = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $address = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank()]
    private ?string $phone_number = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $matricule = null;

    #[ORM\OneToMany(mappedBy: 'training_center', targetEntity: TrainingTrainingCenter::class, orphanRemoval: true)]
    #[Assert\Valid]
    private Collection $trainingTrainingCenters;

    public function __construct()
    {
        $this->trainingTrainingCenters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): static
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
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
            $trainingTrainingCenter->setTrainingCenter($this);
        }

        return $this;
    }

    public function removeTrainingTrainingCenter(TrainingTrainingCenter $trainingTrainingCenter): static
    {
        if ($this->trainingTrainingCenters->removeElement($trainingTrainingCenter)) {
            // set the owning side to null (unless already changed)
            if ($trainingTrainingCenter->getTrainingCenter() === $this) {
                $trainingTrainingCenter->setTrainingCenter(null);
            }
        }

        return $this;
    }
}
