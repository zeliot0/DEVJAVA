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
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Le texte de la question est obligatoire")]
    #[Assert\Length(
        min: 5,
        max: 500,
        minMessage: "Le texte doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le texte ne doit pas dépasser {{ limit }} caractères"
    )]
    private ?string $texte = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le type de question est obligatoire")]
    #[Assert\Choice(
        choices: ["numerique", "choix", "texte", "boolean"],
        message: "Type de question invalide"
    )]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le type de réponse est obligatoire")]
    private ?string $typeReponse = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 50,
        maxMessage: "L’unité ne doit pas dépasser {{ limit }} caractères"
    )]
    private ?string $unite = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Type(type: 'numeric', message: "La valeur idéale doit être numérique")]
    private ?float $valeurIdeale = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Choice(
    choices: ["tres_faible", "faible", "moyen", "eleve", "critique"],
    message: "Niveau invalide"
)]
private ?string $niveau = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La fréquence est obligatoire")]
  #[Assert\Choice(
    choices: ["quotidienne", "hebdomadaire", "mensuelle"],
    message: "Fréquence invalide"
)]
private ?string $frequence = null;


    #[ORM\Column(nullable: true)]
    #[Assert\Positive(message: "L’ordre doit être un nombre positif")]
    private ?int $ordre = null;

    #[ORM\Column]
    private ?bool $genereTache = null;

    #[ORM\Column(type: 'boolean')]
    private bool $actif = true;

    #[ORM\ManyToOne(targetEntity: Theme::class, inversedBy: 'questions')]
    #[ORM\JoinColumn(name: 'theme_id', referencedColumnName: 'id_t', nullable: false)]
    #[Assert\NotNull(message: "Le thème est obligatoire")]
    private ?Theme $theme = null;

    #[ORM\OneToMany(targetEntity: UserResponse::class, mappedBy: 'question')]
    private Collection $userResponses;

    public function __construct()
    {
        $this->userResponses = new ArrayCollection();
    }

    // ================= GETTERS / SETTERS =================

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getTypeReponse(): ?string
    {
        return $this->typeReponse;
    }

    public function setTypeReponse(string $typeReponse): self
    {
        $this->typeReponse = $typeReponse;
        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): self
    {
        $this->unite = $unite;
        return $this;
    }

    public function getValeurIdeale(): ?float
    {
        return $this->valeurIdeale;
    }

    public function setValeurIdeale(?float $valeurIdeale): self
    {
        $this->valeurIdeale = $valeurIdeale;
        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;
        return $this;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(string $frequence): self
    {
        $this->frequence = $frequence;
        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;
        return $this;
    }

    public function isGenereTache(): ?bool
    {
        return $this->genereTache;
    }

    public function setGenereTache(bool $genereTache): self
    {
        $this->genereTache = $genereTache;
        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;
        return $this;
    }
}
