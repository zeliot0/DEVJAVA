<?php

namespace App\Entity;

use App\Repository\MotivationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MotivationRepository::class)] 
class Motivation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_motiv')]
    private ?int $id = null;

    #[ORM\Column(name: 'title_motiv', length: 255)]
    private ?string $title = null;

    #[ORM\Column(name: 'image_motiv', length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(name: 'description_motiv', type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(name: 'mood_motiv', length: 50)]
    private ?string $mood = null;

    
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
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

    public function getMood(): ?string
    {
        return $this->mood;
    }

    public function setMood(string $mood): static
    {
        $this->mood = $mood;
        return $this;
    }

}