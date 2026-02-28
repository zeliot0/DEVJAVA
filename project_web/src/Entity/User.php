<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_user')]
    private ?int $id_user = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(name: 'nom_user', length: 100)]
    private ?string $nom_user = null;

    #[ORM\Column(name: 'photo', length: 255, nullable: true)]
    private ?string $profile_photo = null;

    #[ORM\Column(name: 'reset_token', length: 100, nullable: true)]
    private ?string $reset_token = null;

    #[ORM\Column(name: 'reset_token_expires_at', type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $reset_token_expires_at = null;

    #[ORM\Column(name: 'is_blocked', options: ['default' => false])]
    private bool $is_blocked = false;

    #[ORM\Column(name: 'is_verified', options: ['default' => false])]
    private bool $is_verified = false;

    #[ORM\Column(name: 'verification_token', length: 100, nullable: true)]
    private ?string $verification_token = null;

    #[ORM\Column(name: 'face_descriptor', type: 'text', nullable: true)]
    private ?string $face_descriptor = null;

    #[ORM\Column(name: 'face_enabled', options: ['default' => false])]
    private bool $face_enabled = false;

    #[ORM\Column(name: 'birth_date', type: 'date', nullable: true)]
    private ?\DateTimeInterface $birthDate = null;

    
    /* =====================
       GETTERS / SETTERS
    ====================== */

    public function getId(): ?int
    {
        return $this->id_user;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        $roles = [];

        foreach ($this->roles as $role) {
            if (!is_string($role)) {
                continue;
            }

            // Accept malformed values like "ROLE_ADMIN,ROLE_USER" from manual DB edits.
            foreach (explode(',', $role) as $item) {
                $item = trim($item);
                if ($item !== '') {
                    $roles[] = $item;
                }
            }
        }

        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function eraseCredentials(): void {}

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom_user;
    }

    public function setNom(string $nom): static
    {
        $this->nom_user = $nom;
        return $this;
    }

    public function getProfilePhoto(): ?string
    {
        return $this->profile_photo;
    }

    public function setProfilePhoto(?string $profilePhoto): static
    {
        $this->profile_photo = $profilePhoto;
        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->reset_token;
    }

    public function setResetToken(?string $resetToken): static
    {
        $this->reset_token = $resetToken;
        return $this;
    }

    public function getResetTokenExpiresAt(): ?\DateTimeImmutable
    {
        return $this->reset_token_expires_at;
    }

    public function setResetTokenExpiresAt(?\DateTimeImmutable $expiresAt): static
    {
        $this->reset_token_expires_at = $expiresAt;
        return $this;
    }

    public function isBlocked(): bool
    {
        return $this->is_blocked;
    }

    public function setIsBlocked(bool $blocked): static
    {
        $this->is_blocked = $blocked;
        return $this;
    }

    public function isVerified(): bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $verified): static
    {
        $this->is_verified = $verified;
        return $this;
    }

    public function getVerificationToken(): ?string
    {
        return $this->verification_token;
    }

    public function setVerificationToken(?string $verificationToken): static
    {
        $this->verification_token = $verificationToken;
        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return float[]|null
     */
    public function getFaceDescriptor(): ?array
    {
        if ($this->face_descriptor === null || $this->face_descriptor === '') {
            return null;
        }

        $decoded = json_decode($this->face_descriptor, true);
        if (!is_array($decoded)) {
            return null;
        }

        return array_values(array_map('floatval', $decoded));
    }

    /**
     * @param float[]|null $descriptor
     */
    public function setFaceDescriptor(?array $descriptor): static
    {
        if ($descriptor === null) {
            $this->face_descriptor = null;
            return $this;
        }

        $normalized = array_values(array_map('floatval', $descriptor));
        $this->face_descriptor = json_encode($normalized);

        return $this;
    }

    public function isFaceEnabled(): bool
    {
        return $this->face_enabled;
    }

    public function setFaceEnabled(bool $faceEnabled): static
    {
        $this->face_enabled = $faceEnabled;
        return $this;
    }
}
