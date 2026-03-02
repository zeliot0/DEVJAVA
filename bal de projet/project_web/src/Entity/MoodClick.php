<?php

namespace App\Entity;

use App\Repository\MoodClickRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoodClickRepository::class)]
class MoodClick
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $moodClick = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $clickedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ipAddressClick = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoodClick(): ?string
    {
        return $this->moodClick;
    }

    public function setMoodClick(string $moodClick): static
    {
        $this->moodClick = $moodClick;

        return $this;
    }

    public function getClickedAt(): ?\DateTimeImmutable
    {
        return $this->clickedAt;
    }

    public function setClickedAt(\DateTimeImmutable $clickedAt): static
    {
        $this->clickedAt = $clickedAt;

        return $this;
    }

    public function getIpAddressClick(): ?string
    {
        return $this->ipAddressClick;
    }

    public function setIpAddressClick(?string $ipAddressClick): static
    {
        $this->ipAddressClick = $ipAddressClick;

        return $this;
    }
}

