<?php

namespace App\Entity;

use App\Repository\ConscienceFeedbackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ConscienceFeedbackRepository::class)]
class ConscienceFeedback
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_feedback', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id_user', nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: Theme::class)]
    #[ORM\JoinColumn(name: 'favorite_theme_id', referencedColumnName: 'id_t', nullable: true, onDelete: 'SET NULL')]
    private ?Theme $favoriteTheme = null;

    #[ORM\Column(type: 'smallint')]
    #[Assert\Range(min: 1, max: 5, notInRangeMessage: 'La satisfaction doit etre entre 1 et 5.')]
    private int $satisfaction = 3;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(max: 1200, maxMessage: 'Le commentaire est trop long.')]
    private ?string $comment = null;

    #[ORM\Column(name: 'suggested_theme_name', length: 150, nullable: true)]
    #[Assert\Length(max: 150, maxMessage: 'Le nom du theme suggere est trop long.')]
    private ?string $suggestedThemeName = null;

    #[ORM\Column(name: 'suggested_theme_goal', type: 'text', nullable: true)]
    #[Assert\Length(max: 600, maxMessage: 'La description du theme suggere est trop longue.')]
    private ?string $suggestedThemeGoal = null;

    #[ORM\Column(name: 'suggested_theme_vibe', length: 40, nullable: true)]
    #[Assert\Length(max: 40)]
    private ?string $suggestedThemeVibe = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getFavoriteTheme(): ?Theme
    {
        return $this->favoriteTheme;
    }

    public function setFavoriteTheme(?Theme $favoriteTheme): self
    {
        $this->favoriteTheme = $favoriteTheme;
        return $this;
    }

    public function getSatisfaction(): int
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(int $satisfaction): self
    {
        $this->satisfaction = $satisfaction;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $comment = $comment !== null ? trim($comment) : null;
        $this->comment = $comment === '' ? null : $comment;
        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getSuggestedThemeName(): ?string
    {
        return $this->suggestedThemeName;
    }

    public function setSuggestedThemeName(?string $suggestedThemeName): self
    {
        $suggestedThemeName = $suggestedThemeName !== null ? trim($suggestedThemeName) : null;
        $this->suggestedThemeName = $suggestedThemeName === '' ? null : $suggestedThemeName;
        return $this;
    }

    public function getSuggestedThemeGoal(): ?string
    {
        return $this->suggestedThemeGoal;
    }

    public function setSuggestedThemeGoal(?string $suggestedThemeGoal): self
    {
        $suggestedThemeGoal = $suggestedThemeGoal !== null ? trim($suggestedThemeGoal) : null;
        $this->suggestedThemeGoal = $suggestedThemeGoal === '' ? null : $suggestedThemeGoal;
        return $this;
    }

    public function getSuggestedThemeVibe(): ?string
    {
        return $this->suggestedThemeVibe;
    }

    public function setSuggestedThemeVibe(?string $suggestedThemeVibe): self
    {
        $suggestedThemeVibe = $suggestedThemeVibe !== null ? trim($suggestedThemeVibe) : null;
        $this->suggestedThemeVibe = $suggestedThemeVibe === '' ? null : $suggestedThemeVibe;
        return $this;
    }
}
