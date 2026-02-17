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
    choices: ['BROUILLON', 'EN_COURS', 'TERMINÉ', 'ARCHIVÉ'],  // FRENCH values
    message: 'Statut invalide. Choisissez parmi: BROUILLON, EN_COURS, TERMINÉ, ARCHIVÉ'
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

    public function __construct()
    {
        $this->milestonesGoa = new ArrayCollection();
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

    public function getDateDebutGoa(): ?\DateTimeInterface
    {
        return $this->dateDebutGoa;
    }

    public function setDateDebutGoa(?\DateTimeInterface $dateDebutGoa): static
    {
        $this->dateDebutGoa = $dateDebutGoa;
        return $this;
    }

    public function getDateFinalGoa(): ?\DateTimeInterface
    {
        return $this->dateFinalGoa;
    }

    public function setDateFinalGoa(?\DateTimeInterface $dateFinalGoa): static
    {
        $this->dateFinalGoa = $dateFinalGoa;
        return $this;
    }

    public function getStatusGoa(): ?string
    {
        return $this->statusGoa;
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
    if ($progressGoa === null) {
        $progressGoa = 0;
    }

    $progressGoa = max(0, min(100, $progressGoa));

    $this->progressGoa = $progressGoa;

    if ($progressGoa == 100) {
        $this->statusGoa = 'TERMINÉ';
    }

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

    // Add this method to your Goal entity:
public function removeMilestoneGoa(Milestones $milestoneGoa): static
{
    if ($this->milestonesGoa->removeElement($milestoneGoa)) {
        // set the owning side to null (unless already changed)
        if ($milestoneGoa->getGoalGoa() === $this) {
            $milestoneGoa->setGoalGoa(null);
        }
    }
    return $this;
}


}