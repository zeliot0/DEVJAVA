<?php

namespace App\Entity;

use App\Repository\PhoenixGoalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Goal;
use App\Entity\User;
use App\Entity\PhoenixWisdom;
use App\Entity\PhoenixNetwork;

#[ORM\Entity(repositoryClass: PhoenixGoalRepository::class)]
class PhoenixGoal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // FIX THESE RELATIONSHIPS - Specify the correct column names
 #[ORM\OneToOne(targetEntity: Goal::class, inversedBy: 'phoenixGoal')]
#[ORM\JoinColumn(name: 'original_goal_id', referencedColumnName: 'id_g', nullable: false)]
private ?Goal $originalGoal = null;

   #[ORM\OneToOne(targetEntity: Goal::class, inversedBy: 'phoenixRebirth')]
#[ORM\JoinColumn(name: 'reborn_goal_id', referencedColumnName: 'id_g', nullable: true)]
private ?Goal $rebornGoal = null;

    #[ORM\Column(type: 'text')]
    private ?string $deathAnalysis = null;

    #[ORM\Column(type: 'json')]
    private array $ashesData = [];

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $deathDate = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $rebirthDate = null;

    #[ORM\Column(length: 50)]
    private ?string $phoenixPhase = 'ashes';

    #[ORM\Column(type: 'integer')]
    private int $phoenixLevel = 1;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $resurrectionPlan = null;

    #[ORM\Column(type: 'boolean')]
    private bool $immortalityEnabled = false;

    #[ORM\Column(type: 'boolean')]
    private bool $wisdomShared = false;

    // Add user relationship if missing
 // Find this line (around line 40-50):
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id_user', nullable: true)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'phoenixGoal', targetEntity: PhoenixWisdom::class)]
    private Collection $wisdoms;

    #[ORM\OneToMany(mappedBy: 'sharedGoal', targetEntity: PhoenixNetwork::class)]
    private Collection $networks;

    public function __construct()
    {
        $this->wisdoms = new ArrayCollection();
        $this->networks = new ArrayCollection();
    }

public function getId(): ?int
{
    return $this->id;
}

public function getOriginalGoal(): ?Goal
{
    return $this->originalGoal;
}

public function setOriginalGoal(?Goal $originalGoal): static
{
    $this->originalGoal = $originalGoal;

    return $this;
}

public function getRebornGoal(): ?Goal
{
    return $this->rebornGoal;
}

public function setRebornGoal(?Goal $rebornGoal): static
{
    $this->rebornGoal = $rebornGoal;

    return $this;
}

    public function getDeathAnalysis(): ?string
    {
        return $this->deathAnalysis;
    }

    public function setDeathAnalysis(string $deathAnalysis): static
    {
        $this->deathAnalysis = $deathAnalysis;

        return $this;
    }

    public function getAshesData(): array
    {
        return $this->ashesData;
    }

    public function setAshesData(array $ashesData): static
    {
        $this->ashesData = $ashesData;

        return $this;
    }

    public function getDeathDate(): ?\DateTime
    {
        return $this->deathDate;
    }

    public function setDeathDate(\DateTime $deathDate): static
    {
        $this->deathDate = $deathDate;

        return $this;
    }

    public function getRebirthDate(): ?\DateTime
    {
        return $this->rebirthDate;
    }

    public function setRebirthDate(?\DateTime $rebirthDate): static
    {
        $this->rebirthDate = $rebirthDate;

        return $this;
    }

    public function getPhoenixPhase(): ?string
    {
        return $this->phoenixPhase;
    }

    public function setPhoenixPhase(string $phoenixPhase): static
    {
        $this->phoenixPhase = $phoenixPhase;

        return $this;
    }

    public function getPhoenixLevel(): ?int
    {
        return $this->phoenixLevel;
    }

    public function setPhoenixLevel(int $phoenixLevel): static
    {
        $this->phoenixLevel = $phoenixLevel;

        return $this;
    }

    public function getResurrectionPlan(): ?array
    {
        return $this->resurrectionPlan;
    }

    public function setResurrectionPlan(?array $resurrectionPlan): static
    {
        $this->resurrectionPlan = $resurrectionPlan;

        return $this;
    }

    public function isImmortalityEnabled(): ?bool
    {
        return $this->immortalityEnabled;
    }

    public function setImmortalityEnabled(bool $immortalityEnabled): static
    {
        $this->immortalityEnabled = $immortalityEnabled;

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

    public function getWisdomShared(): bool
    {
        return $this->wisdomShared;
    }

    public function setWisdomShared(bool $wisdomShared): static
    {
        $this->wisdomShared = $wisdomShared;

        return $this;
    }

    /**
     * @return Collection<int, PhoenixWisdom>
     */
    public function getWisdoms(): Collection
    {
        return $this->wisdoms;
    }

    /**
     * @return Collection<int, PhoenixNetwork>
     */
    public function getNetworks(): Collection
    {
        return $this->networks;
    }
}