<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\PasswordStrength;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource()]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    #[Assert\Email()]
    private ?string $email = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\PasswordStrength(
        [
            'message' => "votre mot de passe n'est pas assez fort, Saissez un mot de passe plus fort",
            'minScore' => PasswordStrength::STRENGTH_STRONG,
        ]
    )]
    #[Assert\NotCompromisedPassword(message: "Ce mot de passe a été compromis, il ne doit pas etre utilisé. S'il vous plait utiliser un nouveau mot de passe")]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Answer::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $answers;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?EducationalBackground $educationalBackground = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?InfoUser $infoUser = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private ?ProBackground $proBackground = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UserTest::class, orphanRemoval: true)]
    #[Assert\NotBlank()]
    #[Assert\Valid]
    private Collection $userTests;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->userTests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $answer->setUser($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): static
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getUser() === $this) {
                $answer->setUser(null);
            }
        }

        return $this;
    }

    public function getEducationalBackground(): ?EducationalBackground
    {
        return $this->educationalBackground;
    }

    public function setEducationalBackground(EducationalBackground $educationalBackground): static
    {
        // set the owning side of the relation if necessary
        if ($educationalBackground->getUser() !== $this) {
            $educationalBackground->setUser($this);
        }

        $this->educationalBackground = $educationalBackground;

        return $this;
    }

    public function getInfoUser(): ?InfoUser
    {
        return $this->infoUser;
    }

    public function setInfoUser(InfoUser $infoUser): static
    {
        // set the owning side of the relation if necessary
        if ($infoUser->getUser() !== $this) {
            $infoUser->setUser($this);
        }

        $this->infoUser = $infoUser;

        return $this;
    }

    public function getProBackground(): ?ProBackground
    {
        return $this->proBackground;
    }

    public function setProBackground(ProBackground $proBackground): static
    {
        // set the owning side of the relation if necessary
        if ($proBackground->getUser() !== $this) {
            $proBackground->setUser($this);
        }

        $this->proBackground = $proBackground;

        return $this;
    }

    /**
     * @return Collection<int, UserTest>
     */
    public function getUserTests(): Collection
    {
        return $this->userTests;
    }

    public function addUserTest(UserTest $userTest): static
    {
        if (!$this->userTests->contains($userTest)) {
            $this->userTests->add($userTest);
            $userTest->setUser($this);
        }

        return $this;
    }

    public function removeUserTest(UserTest $userTest): static
    {
        if ($this->userTests->removeElement($userTest)) {
            // set the owning side to null (unless already changed)
            if ($userTest->getUser() === $this) {
                $userTest->setUser(null);
            }
        }

        return $this;
    }
}
