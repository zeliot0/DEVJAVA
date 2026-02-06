<?php

namespace App\Entity;

use App\Repository\MilestonesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MilestonesRepository::class)]
class Milestones
{
   #[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(name: 'id_m', type: 'integer')]
private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $titleMilestone = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionMilestone = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dueDate = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $completedDate = null;

    
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'milestones')]
    #[ORM\JoinColumn(name: 'goal_id', referencedColumnName: 'id_g', nullable: false)]
    private ?Goal $goal = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleMilestone(): ?string
    {
        return $this->titleMilestone;
    }

    public function setTitleMilestone(string $titleMilestone): static       
    {
        $this->titleMilestone = $titleMilestone;
        return $this;
    }

    public function getDescriptionMilestone(): ?string
    {
        return $this->descriptionMilestone;
    }

    public function setDescriptionMilestone(string $descriptionMilestone): static
    {
        $this->descriptionMilestone = $descriptionMilestone;
        return $this;
    }

    public function getDueDate(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeImmutable $dueDate): static
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function getCompletedDate(): ?\DateTimeImmutable
    {
        return $this->completedDate;
    }

    public function setCompletedDate(?\DateTimeImmutable $completedDate): static
    {
        $this->completedDate = $completedDate;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static     
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getGoal(): ?Goal
    {
        return $this->goal;
    }

    public function setGoal(?Goal $goal): static
    {
        $this->goal = $goal;
        return $this;
    }

    // ========================
    // ALIAS METHODS FOR BACKWARD COMPATIBILITY
    // These allow templates to use old property names
    // ========================

    /**
     * Alias for getTitleMilestone()
     */
    public function getTitleGoa(): ?string
    {
        return $this->titleMilestone;
    }

    /**
     * Alias for setTitleMilestone()
     */
    public function setTitleGoa(string $titleGoa): static
    {
        $this->titleMilestone = $titleGoa;
        return $this;
    }

    /**
     * Alias for getDescriptionMilestone()
     */
    public function getDescriptionGoa(): ?string
    {
        return $this->descriptionMilestone;
    }

    /**
     * Alias for setDescriptionMilestone()
     */
    public function setDescriptionGoa(string $descriptionGoa): static
    {
        $this->descriptionMilestone = $descriptionGoa;
        return $this;
    }

    /**
     * Alias for getDueDate()
     */
    public function getCompletedatGoa(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    /**
     * Alias for setDueDate()
     */
    public function setCompletedatGoa(\DateTimeImmutable $completedatGoa): static
    {
        $this->dueDate = $completedatGoa;
        return $this;
    }

    /**
     * Alias for getCreatedAt()
     */
    public function getCreatedatGoa(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Alias for setCreatedAt()
     */
    public function setCreatedatGoa(\DateTimeImmutable $createdatGoa): static
    {
        $this->createdAt = $createdatGoa;
        return $this;
    }

    /**
     * Alias for getCompletedDate()
     */
    public function getCompletedatGoaCompleted(): ?\DateTimeImmutable
    {
        return $this->completedDate;
    }

    /**
     * Alias for setCompletedDate()
     */
    public function setCompletedatGoaCompleted(?\DateTimeImmutable $completedatGoa): static
    {
        $this->completedDate = $completedatGoa;
        return $this;
    }
}
