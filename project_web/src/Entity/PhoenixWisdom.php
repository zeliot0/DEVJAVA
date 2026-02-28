<?php

namespace App\Entity;

use App\Repository\PhoenixWisdomRepository;
use App\Entity\PhoenixGoal;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoenixWisdomRepository::class)]
class PhoenixWisdom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(type: 'text')]
    private ?string $lesson = null;

    #[ORM\Column(type: 'integer')]
    private int $successCount = 0;

    #[ORM\Column(type: 'json')]
    private array $tags = [];

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\ManyToOne(targetEntity: PhoenixGoal::class, inversedBy: 'wisdoms')]
    #[ORM\JoinColumn(name: 'phoenix_goal_id', referencedColumnName: 'id', nullable: true)]
    private ?PhoenixGoal $phoenixGoal = null;

    // ✅ Fixed: single property with correct JoinColumn
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'contributor_id', referencedColumnName: 'id_user', nullable: true)]
    private ?User $contributor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;
        return $this;
    }

    public function getLesson(): ?string
    {
        return $this->lesson;
    }

    public function setLesson(string $lesson): static
    {
        $this->lesson = $lesson;
        return $this;
    }

    public function getSuccessCount(): ?int
    {
        return $this->successCount;
    }

    public function setSuccessCount(int $successCount): static
    {
        $this->successCount = $successCount;
        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): static
    {
        $this->tags = $tags;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getPhoenixGoal(): ?PhoenixGoal
    {
        return $this->phoenixGoal;
    }

    public function setPhoenixGoal(?PhoenixGoal $phoenixGoal): static
    {
        $this->phoenixGoal = $phoenixGoal;
        return $this;
    }

    public function getContributor(): ?User
    {
        return $this->contributor;
    }

    public function setContributor(?User $contributor): static
    {
        $this->contributor = $contributor;
        return $this;
    }
}