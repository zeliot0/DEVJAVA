<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
     #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_t', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom du thème est obligatoire")]
    #[Assert\Length(
        min: 3,
        minMessage: "Le nom doit contenir au moins {{ limit }} caractères",
        max: 255
    )]
    private ?string $nom = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(
        max: 500,
        maxMessage: "La description ne doit pas dépasser {{ limit }} caractères"
    )]
    private ?string $description_q = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: "L’intention ne doit pas dépasser {{ limit }} caractères"
    )]
    private ?string $intention = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L’icône est obligatoire")]
    #[Assert\Regex(
        pattern: "/^fa-/",
        message: "L’icône doit être une classe FontAwesome valide (ex: fa-solid fa-heart)"
    )]
    private ?string $icone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La couleur est obligatoire")]
    #[Assert\Regex(
        pattern: "/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/",
        message: "La couleur doit être au format hexadécimal (ex: #6C63FF)"
    )]
    private ?string $couleur = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull(message: "La priorité est obligatoire")]
    #[Assert\Range(
        min: 1,
        max: 5,
        notInRangeMessage: "La priorité doit être comprise entre {{ min }} et {{ max }}"
    )]
    private ?int $priorite = null;

    #[ORM\Column(type: 'boolean')]
    private bool $actif = true;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $createdAt;

    #[ORM\OneToMany(mappedBy: 'theme', targetEntity: Question::class)]
    private Collection $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
    }

    // ===== GETTERS / SETTERS =====

    public function getIdT(): ?int
    {
        return $this->id_t;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescriptionQ(): ?string
    {
        return $this->description_q;
    }

    public function setDescriptionQ(?string $description_q): self
    {
        $this->description_q = $description_q;
        return $this;
    }

    public function getIntention(): ?string
    {
        return $this->intention;
    }

    public function setIntention(?string $intention): self
    {
        $this->intention = $intention;
        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;
        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;
        return $this;
    }

    public function getPriorite(): ?int
    {
        return $this->priorite;
    }

    public function setPriorite(int $priorite): self
    {
        $this->priorite = $priorite;
        return $this;
    }

    public function isActif(): bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;
        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getQuestions(): Collection
    {
        return $this->questions;
    }
}
