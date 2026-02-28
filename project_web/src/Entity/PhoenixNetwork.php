<?php

namespace App\Entity;

use App\Repository\PhoenixNetworkRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: PhoenixNetworkRepository::class)]
class PhoenixNetwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'mentor_id', referencedColumnName: 'id_user', nullable: true)]
    private ?User $mentor = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'phoenix_rising_id', referencedColumnName: 'id_user', nullable: true)]
    private ?User $phoenixRising = null;

    #[ORM\ManyToOne(targetEntity: PhoenixGoal::class, inversedBy: 'networks')]
    #[ORM\JoinColumn(name: 'shared_goal_id', referencedColumnName: 'id', nullable: true)]
    private ?PhoenixGoal $sharedGoal = null;

    #[ORM\Column(length: 100)]
    private ?string $networkType = 'mentorship';

    #[ORM\Column(type: 'datetime')]
    private ?DateTimeInterface $connectedAt = null;

    // Getters and setters (keep as they are – they already exist below)
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMentor(): ?User
    {
        return $this->mentor;
    }

    public function setMentor(?User $mentor): static
    {
        $this->mentor = $mentor;
        return $this;
    }

    public function getPhoenixRising(): ?User
    {
        return $this->phoenixRising;
    }

    public function setPhoenixRising(?User $phoenixRising): static
    {
        $this->phoenixRising = $phoenixRising;
        return $this;
    }

    public function getSharedGoal(): ?PhoenixGoal
    {
        return $this->sharedGoal;
    }

    public function setSharedGoal(?PhoenixGoal $sharedGoal): static
    {
        $this->sharedGoal = $sharedGoal;
        return $this;
    }

    public function getNetworkType(): ?string
    {
        return $this->networkType;
    }

    public function setNetworkType(string $networkType): static
    {
        $this->networkType = $networkType;
        return $this;
    }

    public function getConnectedAt(): ?\DateTimeInterface
    {
        return $this->connectedAt;
    }

    public function setConnectedAt(\DateTimeInterface $connectedAt): static
    {
        $this->connectedAt = $connectedAt;
        return $this;
    }
}