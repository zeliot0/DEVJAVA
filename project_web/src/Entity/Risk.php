<?php

namespace App\Entity;

use App\Repository\RiskRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RiskRepository::class)]
class Risk
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Goal::class, inversedBy: 'risks')]
    #[ORM\JoinColumn(name: 'goal_id', referencedColumnName: 'id_g', nullable: true, onDelete: 'SET NULL')]
    private ?Goal $goal = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id_user', nullable: true, onDelete: 'SET NULL')]
    private ?User $user = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $aiScore = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $aiAdvice = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $aiCategory = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $aiRiskScore = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $aiMitigationPlan = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
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

    public function getAiScore(): ?float
    {
        return $this->aiScore;
    }

    public function setAiScore(?float $aiScore): static
    {
        $this->aiScore = $aiScore;
        return $this;
    }

    public function getAiAdvice(): ?string
    {
        return $this->aiAdvice;
    }

    public function setAiAdvice(?string $aiAdvice): static
    {
        $this->aiAdvice = $aiAdvice;
        return $this;
    }

    public function getAiCategory(): ?string
    {
        return $this->aiCategory;
    }

    public function setAiCategory(?string $aiCategory): static
    {
        $this->aiCategory = $aiCategory;
        return $this;
    }

    public function getAiRiskScore(): ?int
    {
        return $this->aiRiskScore;
    }

    public function setAiRiskScore(?int $score): static
    {
        $this->aiRiskScore = $score;
        return $this;
    }

    public function getAiMitigationPlan(): ?string
    {
        return $this->aiMitigationPlan;
    }

    public function setAiMitigationPlan(?string $plan): static
    {
        $this->aiMitigationPlan = $plan;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
}
