<?php

namespace App\Entity;

use App\Repository\GoalRepository;
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
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titleGoa = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionGoa = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebutGoa = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFinalGoa = null;

    #[ORM\Column(length: 255)]
    private ?string $statusGoa = 'DRAFT';

    #[ORM\Column(nullable: true)]
    private ?float $progressGoa = 0.0;

    #[ORM\Column(length: 255)]
    private ?string $categoryGoa = null;

    #[ORM\Column(length: 255)]
    private ?string $priorityGoa = 'MEDIUM';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notesGoa = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $colorGoa = '#3b82f6';

    #[ORM\OneToMany(mappedBy: 'goal', targetEntity: Milestones::class, cascade: ['persist', 'remove'])]
    private Collection $milestones;

    public function __construct()
    {
        $this->milestones = new ArrayCollection();
    }

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
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

    public function setDateDebutGoa(\DateTimeInterface $dateDebutGoa): static
    {
        $this->dateDebutGoa = $dateDebutGoa;
        return $this;
    }

    public function getDateFinalGoa(): ?\DateTimeInterface
    {
        return $this->dateFinalGoa;
    }

    public function setDateFinalGoa(\DateTimeInterface $dateFinalGoa): static
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
    public function getMilestones(): Collection
    {
        return $this->milestones;
    }

    public function addMilestone(Milestones $milestone): static
    {
        if (!$this->milestones->contains($milestone)) {
            $this->milestones->add($milestone);
            $milestone->setGoal($this);
        }
        return $this;
    }

    public function removeMilestone(Milestones $milestone): static
    {
        if ($this->milestones->removeElement($milestone)) {
            // set the owning side to null (unless already changed)
            if ($milestone->getGoal() === $this) {
                $milestone->setGoal(null);
            }
        }
        return $this;
    }
}