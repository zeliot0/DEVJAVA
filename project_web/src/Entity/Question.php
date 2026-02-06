<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $texte = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $typeReponse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $unite = null;

    #[ORM\Column(nullable: true)]
    private ?float $valeurIdeale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $frequence = null;

 #[ORM\Column(nullable: true)]
private ?int $ordre = null;


    #[ORM\Column]
    private ?bool $genereTache = null;
#[ORM\Column(type: 'boolean')]
private bool $actif = true;

    #[ORM\ManyToOne(targetEntity: Theme::class, inversedBy: 'questions')]
    #[ORM\JoinColumn(name: 'theme_id', referencedColumnName: 'id_t', nullable: false)]
    private ?Theme $theme = null;

    /**
     * @var Collection<int, UserResponse>
     */
    #[ORM\OneToMany(targetEntity: UserResponse::class, mappedBy: 'question')]
    private Collection $userResponses;

    public function __construct()
    {
        $this->userResponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
public function isActif(): bool
{
    return $this->actif;
}

public function setActif(bool $actif): self
{
    $this->actif = $actif;
    return $this;
}

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getTypeReponse(): ?string
    {
        return $this->typeReponse;
    }

    public function setTypeReponse(string $typeReponse): static
    {
        $this->typeReponse = $typeReponse;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): static
    {
        $this->unite = $unite;

        return $this;
    }

    public function getValeurIdeale(): ?float
    {
        return $this->valeurIdeale;
    }

    public function setValeurIdeale(?float $valeurIdeale): static
    {
        $this->valeurIdeale = $valeurIdeale;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(string $frequence): static
    {
        $this->frequence = $frequence;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): static
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function isGenereTache(): ?bool
    {
        return $this->genereTache;
    }

    public function setGenereTache(bool $genereTache): static
    {
        $this->genereTache = $genereTache;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): static
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection<int, UserResponse>
     */
    public function getUserResponses(): Collection
    {
        return $this->userResponses;
    }

    public function addUserResponse(UserResponse $userResponse): static
    {
        if (!$this->userResponses->contains($userResponse)) {
            $this->userResponses->add($userResponse);
            $userResponse->setQuestion($this);
        }

        return $this;
    }

    public function removeUserResponse(UserResponse $userResponse): static
    {
        if ($this->userResponses->removeElement($userResponse)) {
            // set the owning side to null (unless already changed)
            if ($userResponse->getQuestion() === $this) {
                $userResponse->setQuestion(null);
            }
        }

        return $this;
    }
}
