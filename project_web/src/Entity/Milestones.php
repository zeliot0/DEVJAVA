<?php

namespace App\Entity;

use App\Repository\MilestonesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MilestonesRepository::class)]
class Milestones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_M')]
    private ?int $id = null;

    #[ORM\Column(name: 'title_milestone', length: 255)]
    #[Assert\NotBlank(message: 'Le titre est obligatoire')]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: 'Le titre doit faire au moins {{ limit }} caractères',
        maxMessage: 'Le titre ne peut pas dépasser {{ limit }} caractères'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z0-9\s\-\'",\.!?À-ÿ]+$/u',
        message: 'Le titre contient des caractères non autorisés'
    )]
    private ?string $title = null;

    #[ORM\Column(name: 'description_milestone', length: 255)]
    #[Assert\NotBlank(message: 'La description est obligatoire')]
    #[Assert\Length(
        min: 10,
        max: 255,
        minMessage: 'La description doit faire au moins {{ limit }} caractères',
        maxMessage: 'La description ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $description = null;

    #[ORM\Column(name: 'due_date')]
    #[Assert\NotBlank(message: 'La date d\'échéance est obligatoire')]
    #[Assert\GreaterThanOrEqual(
        value: 'today',
        message: 'La date d\'échéance ne peut pas être dans le passé'
    )]
    #[Assert\Type('\DateTimeInterface', message: 'La date d\'échéance doit être une date valide')]
    private ?\DateTimeImmutable $dueDate = null;

    #[ORM\Column(name: 'completed_date', nullable: true)]
    #[Assert\GreaterThanOrEqual(
        propertyPath: 'dueDate',
        message: 'La date de complétion doit être après la date d\'échéance'
    )]
    #[Assert\Type('\DateTimeInterface', message: 'La date de complétion doit être une date valide')]
    private ?\DateTimeImmutable $completedDate = null;

    #[ORM\Column(name: 'created_at')]
    #[Assert\NotNull(message: 'La date de création est obligatoire')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'milestonesGoa')]
    #[ORM\JoinColumn(name: 'goal_id', referencedColumnName: 'id_g', nullable: false)]
    #[Assert\NotNull(message: 'L\'objectif est obligatoire')]
    private ?Goal $goalGoa = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static       
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
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

    
    public function getStatus(): string
    {
        if ($this->completedDate) {
            return 'completed';
        }
        
        if ($this->dueDate && $this->dueDate < new \DateTimeImmutable()) {
            return 'overdue';
        }
        
        if ($this->dueDate && $this->dueDate <= new \DateTimeImmutable('+7 days')) {
            return 'upcoming';
        }
        
        return 'pending';
    }

    public function getGoalGoa(): ?Goal
    {
        return $this->goalGoa;
    }

    public function setGoalGoa(?Goal $goalGoa): static
    {
        $this->goalGoa = $goalGoa;
        return $this;
    }
}