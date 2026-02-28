<?php

namespace App\Entity;

use App\Repository\GoalRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoalRepository::class)]
class Goal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_g')]
    private ?int $idGoa = null;

    #[ORM\Column(name: 'title_goa', length: 255)]
    #[Assert\NotBlank(message: 'Le titre est obligatoire')]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: 'Le titre doit faire au moins {{ limit }} caractères',
        maxMessage: 'Le titre ne peut pas dépasser {{ limit }} caractères'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z0-9\s\-\'",\.!?À-ÿ]+$/',
        message: 'Le titre contient des caractères non autorisés'
    )]
    private ?string $titleGoa = null;

    #[ORM\Column(name: 'description_goa', length: 255)]
    #[Assert\NotBlank(message: 'La description est obligatoire')]
    #[Assert\Length(
        min: 10,
        max: 500,
        minMessage: 'La description doit faire au moins {{ limit }} caractères',
        maxMessage: 'La description ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $descriptionGoa = null;

   #[ORM\Column(name: 'date_debut_goa', type: Types::DATE_MUTABLE, nullable: true)]
    #[Assert\GreaterThanOrEqual(
        value: 'today',
        message: 'La date de début ne peut pas être dans le passé'
    )]
    #[Assert\Expression(
        "this.getDateDebutGoa() === null or this.getDateFinalGoa() === null or this.getDateDebutGoa() <= this.getDateFinalGoa()",
        message: 'La date de début doit être avant la date de fin'
    )]
    #[Assert\Type('\DateTimeInterface', message: 'La date de début doit être une date valide')]
    private ?\DateTimeInterface $dateDebutGoa = null;

    #[ORM\Column(name: 'date_final_goa', type: Types::DATE_MUTABLE, nullable: true)]
    #[Assert\GreaterThanOrEqual(
        propertyPath: 'dateDebutGoa',
        message: 'La date de fin doit être après la date de début'
    )]
    #[Assert\Type('\DateTimeInterface', message: 'La date de fin doit être une date valide')]
    private ?\DateTimeInterface $dateFinalGoa = null;

    #[ORM\Column(name: 'status_goa', length: 255)]
    #[Assert\NotBlank(message: 'Le statut est obligatoire')]
    #[Assert\Choice(
        choices: ['BROUILLON', 'EN_COURS', 'TERMINÉ', 'ARCHIVÉ', 'ABANDONNÉ', 'ÉCHOUÉ'],  // Added ABANDONNÉ and ÉCHOUÉ for Phoenix
        message: 'Statut invalide. Choisissez parmi: BROUILLON, EN_COURS, TERMINÉ, ARCHIVÉ, ABANDONNÉ, ÉCHOUÉ'
    )]
    private ?string $statusGoa = 'BROUILLON';

    #[ORM\Column(name: 'progress_goa', nullable: true)]
    #[Assert\Range(
        min: 0,
        max: 100,
        notInRangeMessage: 'La progression doit être entre {{ min }} et {{ max }}'
    )]
    #[Assert\Type('float', message: 'La progression doit être un nombre')]
    #[Assert\Regex(
        pattern: '/^\d+(\.\d{1,2})?$/',
        message: 'La progression doit être un nombre avec maximum 2 décimales'
    )]
    private ?float $progressGoa = 0.0;

    #[ORM\Column(name: 'category_goa', length: 255)]
    #[Assert\NotBlank(message: 'La catégorie est obligatoire')]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'La catégorie doit faire au moins {{ limit }} caractères',
        maxMessage: 'La catégorie ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $categoryGoa = null;

    #[ORM\Column(name: 'priority_goa', length: 255)]
    #[Assert\NotBlank(message: 'La priorité est obligatoire')]
    #[Assert\Choice(
        choices: ['BASSE', 'MOYENNE', 'HAUTE', 'URGENTE'], 
        message: 'Priorité invalide. Choisissez parmi: BASSE, MOYENNE, HAUTE, URGENTE'
    )]
    private ?string $priorityGoa = 'MOYENNE';

    #[ORM\Column(name: 'notes_goa', type: Types::TEXT, nullable: true)]
    #[Assert\Length(
        max: 1000,
        maxMessage: 'Les notes ne peuvent pas dépasser {{ limit }} caractères'
    )]
    private ?string $notesGoa = null;

    #[ORM\Column(name: 'color_goa', length: 50, nullable: true)]
    #[Assert\Regex(
        pattern: '/^#[0-9A-Fa-f]{6}$/',
        message: 'La couleur doit être au format hexadécimal (#RRGGBB)'
    )]
    private ?string $colorGoa = '#3b82f6';

    #[ORM\OneToMany(mappedBy: 'goalGoa', targetEntity: Milestones::class, cascade: ['persist', 'remove'])]
    private Collection $milestonesGoa;

    #[ORM\OneToMany(mappedBy: 'goal', targetEntity: Risk::class, cascade: ['persist', 'remove'])]
    private Collection $risks;

    #[ORM\Column(name: 'success_score', type: 'float', nullable: true)]
    private ?float $successScore = null;

    #[ORM\Column(name: 'ai_success_score', type: 'integer', nullable: true)]
    private ?int $aiSuccessScore = null;

    #[ORM\Column(name: 'ai_success_advice', type: 'text', nullable: true)]
    private ?string $aiSuccessAdvice = null;

    // 🔥 PHOENIX RELATIONSHIPS 🔥
 #[ORM\OneToOne(mappedBy: 'originalGoal', targetEntity: PhoenixGoal::class, cascade: ['persist', 'remove'])]
private ?PhoenixGoal $phoenixGoal = null;

#[ORM\OneToOne(mappedBy: 'rebornGoal', targetEntity: PhoenixGoal::class, cascade: ['persist', 'remove'])]
private ?PhoenixGoal $phoenixRebirth = null;

    public function __construct()
    {
        $this->milestonesGoa = new ArrayCollection();
        $this->risks = new ArrayCollection();
    }

    public function getIdGoa(): ?int
    {
        return $this->idGoa;
    }

    public function getTitleGoa(): ?string
    {
        return $this->titleGoa;
    }

    public function setTitleGoa(string $titleGoa): static
    {
        $this->titleGoa = $titleGoa;

        return $this;
    }

    public function getDescriptionGoa(): ?string
    {
        return $this->descriptionGoa;
    }

    public function setDescriptionGoa(string $descriptionGoa): static
    {
        $this->descriptionGoa = $descriptionGoa;

        return $this;
    }

    public function getDateDebutGoa(): ?\DateTime
    {
        return $this->dateDebutGoa;
    }

    public function setDateDebutGoa(?\DateTime $dateDebutGoa): static
    {
        $this->dateDebutGoa = $dateDebutGoa;

        return $this;
    }

    public function getDateFinalGoa(): ?\DateTime
    {
        return $this->dateFinalGoa;
    }

    public function setDateFinalGoa(?\DateTime $dateFinalGoa): static
    {
        $this->dateFinalGoa = $dateFinalGoa;

        return $this;
    }

    public function getStatusGoa(): ?string
    {
        return $this->statusGoa;
    }

    /** @return Collection<int,Risk> */
    public function getRisks(): Collection
    {
        return $this->risks;
    }

    public function addRisk(Risk $risk): static
    {
        if (!$this->risks->contains($risk)) {
            $this->risks->add($risk);
            $risk->setGoal($this);
        }

        return $this;
    }

    public function removeRisk(Risk $risk): static
    {
        if ($this->risks->removeElement($risk)) {
            if ($risk->getGoal() === $this) {
                $risk->setGoal(null);
            }
        }

        return $this;
    }

    public function getSuccessScore(): ?float
    {
        return $this->successScore;
    }

    public function setSuccessScore(?float $score): static
    {
        $this->successScore = $score;
        return $this;
    }

    public function getAiSuccessScore(): ?int
    {
        return $this->aiSuccessScore;
    }

    public function setAiSuccessScore(?int $score): static
    {
        $this->aiSuccessScore = $score;
        return $this;
    }

    public function getAiSuccessAdvice(): ?string
    {
        return $this->aiSuccessAdvice;
    }

    public function setAiSuccessAdvice(?string $advice): static
    {
        $this->aiSuccessAdvice = $advice;
        return $this;
    }

    public function setStatusGoa(string $statusGoa): static
    {
        $this->statusGoa = $statusGoa;

        return $this;
    }

    public function getProgressGoa(): ?float
    {
        return $this->progressGoa;
    }

    public function setProgressGoa(?float $progressGoa): static
    {
        $this->progressGoa = $progressGoa;

        return $this;
    }

    public function getCategoryGoa(): ?string
    {
        return $this->categoryGoa;
    }

    public function setCategoryGoa(string $categoryGoa): static
    {
        $this->categoryGoa = $categoryGoa;

        return $this;
    }

    public function getPriorityGoa(): ?string
    {
        return $this->priorityGoa;
    }

    public function setPriorityGoa(string $priorityGoa): static
    {
        $this->priorityGoa = $priorityGoa;

        return $this;
    }

    public function getNotesGoa(): ?string
    {
        return $this->notesGoa;
    }

    public function setNotesGoa(?string $notesGoa): static
    {
        $this->notesGoa = $notesGoa;

        return $this;
    }

    public function getColorGoa(): ?string
    {
        return $this->colorGoa;
    }

    public function setColorGoa(?string $colorGoa): static
    {
        $this->colorGoa = $colorGoa;

        return $this;
    }

    /**
     * @return Collection<int, Milestones>
     */
    public function getMilestonesGoa(): Collection
    {
        return $this->milestonesGoa;
    }

    public function addMilestonesGoa(Milestones $milestonesGoa): static
    {
        if (!$this->milestonesGoa->contains($milestonesGoa)) {
            $this->milestonesGoa->add($milestonesGoa);
            $milestonesGoa->setGoalGoa($this);
        }

        return $this;
    }

    public function removeMilestonesGoa(Milestones $milestonesGoa): static
    {
        if ($this->milestonesGoa->removeElement($milestonesGoa)) {
            // set the owning side to null (unless already changed)
            if ($milestonesGoa->getGoalGoa() === $this) {
                $milestonesGoa->setGoalGoa(null);
            }
        }

        return $this;
    }

    public function getPhoenixGoal(): ?PhoenixGoal
    {
        return $this->phoenixGoal;
    }

    public function setPhoenixGoal(?PhoenixGoal $phoenixGoal): static
    {
        // unset the owning side of the relation if necessary
        if ($phoenixGoal === null && $this->phoenixGoal !== null) {
            $this->phoenixGoal->setOriginalGoal(null);
        }

        // set the owning side of the relation if necessary
        if ($phoenixGoal !== null && $phoenixGoal->getOriginalGoal() !== $this) {
            $phoenixGoal->setOriginalGoal($this);
        }

        $this->phoenixGoal = $phoenixGoal;

        return $this;
    }

    public function getPhoenixRebirth(): ?PhoenixGoal
    {
        return $this->phoenixRebirth;
    }

    public function setPhoenixRebirth(?PhoenixGoal $phoenixRebirth): static
    {
        // unset the owning side of the relation if necessary
        if ($phoenixRebirth === null && $this->phoenixRebirth !== null) {
            $this->phoenixRebirth->setRebornGoal(null);
        }

        // set the owning side of the relation if necessary
        if ($phoenixRebirth !== null && $phoenixRebirth->getRebornGoal() !== $this) {
            $phoenixRebirth->setRebornGoal($this);
        }

        $this->phoenixRebirth = $phoenixRebirth;

        return $this;
    }

    /**
     * Check if the goal is dead (abandoned or failed)
     * Used by Phoenix system to identify goals that can be resurrected
     */
    public function isDead(): bool
    {
        $deadStatuses = ['ABANDONNÉ', 'ÉCHOUÉ', 'ARCHIVÉ'];
        return in_array($this->getStatusGoa(), $deadStatuses);
    }

    /**
     * Check if the goal can be resurrected
     * Conditions: 
     * 1. Goal is dead (abandoned/failed)
     * 2. No existing Phoenix record for this goal
     */
    public function canBeResurrected(): bool
    {
        return $this->isDead() && $this->phoenixGoal === null;
    }

    /**
     * Get the current Phoenix phase if this goal is part of a Phoenix journey
     */
    public function getPhoenixPhase(): ?string
    {
        return $this->phoenixGoal?->getPhoenixPhase();
    }

    /**
     * Check if this goal has achieved Phoenix immortality
     */
    public function isImmortal(): bool
    {
        return $this->phoenixGoal?->isImmortalityEnabled() ?? false;
    }

    /**
     * Get the number of times this goal has been reborn (through Phoenix)
     */
    public function getRebirthCount(): int
    {
        $count = 0;
        $current = $this;
        
        // Count how many times this goal chain has been reborn
        while ($current->getPhoenixRebirth()) {
            $count++;
            $current = $current->getPhoenixRebirth()->getRebornGoal();
        }
        
        return $count;
    }

    /**
     * Get the original goal (if this is a reborn goal)
     */
    public function getOriginalGoal(): ?self
    {
        return $this->phoenixGoal?->getOriginalGoal();
    }

    /**
     * Get a user-friendly status with Phoenix emoji
     */
    public function getDisplayStatus(): string
    {
        if ($this->isDead()) {
            return '💀 ' . $this->getStatusGoa();
        }
        
        if ($this->phoenixGoal) {
            $phase = $this->phoenixGoal->getPhoenixPhase();
            $emoji = match($phase) {
                'ashes' => '🌑',
                'spark' => '✨',
                'flame' => '🔥',
                'risen' => '🦅',
                default => '🔥'
            };
            return $emoji . ' ' . $this->getStatusGoa() . ' (Phoenix: ' . $phase . ')';
        }
        
        return $this->getStatusGoa() ?? 'INCONNU';
    }

    public function __toString(): string
    {
        return $this->getTitleGoa() ?? 'Nouvel Objectif';
    }

    /**
 * Calculate progress based on elapsed time between start and end dates.
 * Returns a percentage (0-100).
 */
public function getCalculatedProgress(): float
{
    // If dates are missing, fall back to stored progress
    if (!$this->getDateDebutGoa() || !$this->getDateFinalGoa()) {
        return $this->getProgressGoa() ?? 0;
    }

    $now = new \DateTime();
    $start = $this->getDateDebutGoa();
    $end = $this->getDateFinalGoa();

    // If not started yet
    if ($now < $start) {
        return 0;
    }

    // If already finished
    if ($now > $end) {
        return 100;
    }

    // Calculate percentage of time elapsed
    $totalDays = $start->diff($end)->days;
    $elapsedDays = $start->diff($now)->days;

    return round(($elapsedDays / $totalDays) * 100, 2);
}
}