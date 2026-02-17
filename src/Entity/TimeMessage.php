<?php

namespace App\Entity;

use App\Repository\TimeMessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeMessageRepository::class)]
#[ORM\Table(name: 'time_message')]
class TimeMessage
{
    public const TYPE_TO_FUTURE = 'to_future';
    public const TYPE_TO_PAST = 'to_past';
    public const TYPE_REFLECTION = 'reflection';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_time_message', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'title_msg', length: 255)]
    private ?string $titleMsg = null;

    #[ORM\Column(name: 'message_type_g', length: 50)]
    private ?string $messageTypeG = null;

    #[ORM\Column(name: 'content_msg', type: Types::TEXT)]
    private ?string $contentMsg = null;

    #[ORM\Column(name: 'video_path_msg', length: 255, nullable: true)]
    private ?string $videoPathMsg = null;

    #[ORM\Column(name: 'delivery_date_msg', type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deliveryDateMsg = null;

    #[ORM\Column(name: 'is_delivered_msg', type: 'boolean', options: ['default' => false])]
    private ?bool $isDeliveredMsg = false;

    #[ORM\Column(name: 'created_at_msg', type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAtMsg = null;

    #[ORM\Column(name: 'id_user', type: 'integer')]
    private ?int $idUser = null;

    // FIXED RELATIONSHIP - Now properly references Goal with id_g
    #[ORM\ManyToOne(targetEntity: Goal::class)]
    #[ORM\JoinColumn(name: 'id_g', referencedColumnName: 'id_g', nullable: true)]
    private ?Goal $goal = null;

    #[ORM\Column(name: 'parent_message_id', type: 'integer', nullable: true)]
    private ?int $parentMessageId = null;

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleMsg(): ?string
    {
        return $this->titleMsg;
    }

    public function setTitleMsg(string $titleMsg): self
    {
        $this->titleMsg = $titleMsg;
        return $this;
    }

    public function getMessageTypeG(): ?string
    {
        return $this->messageTypeG;
    }

    public function setMessageTypeG(string $messageTypeG): self
    {
        if (!in_array($messageTypeG, [self::TYPE_TO_FUTURE, self::TYPE_TO_PAST, self::TYPE_REFLECTION])) {
            throw new \InvalidArgumentException("Invalid message type");
        }
        $this->messageTypeG = $messageTypeG;
        return $this;
    }

    public function getContentMsg(): ?string
    {
        return $this->contentMsg;
    }

    public function setContentMsg(string $contentMsg): self
    {
        $this->contentMsg = $contentMsg;
        return $this;
    }

    public function getVideoPathMsg(): ?string
    {
        return $this->videoPathMsg;
    }

    public function setVideoPathMsg(?string $videoPathMsg): self
    {
        $this->videoPathMsg = $videoPathMsg;
        return $this;
    }

    public function getDeliveryDateMsg(): ?\DateTimeInterface
    {
        return $this->deliveryDateMsg;
    }

    public function setDeliveryDateMsg(?\DateTimeInterface $deliveryDateMsg): self
    {
        $this->deliveryDateMsg = $deliveryDateMsg;
        return $this;
    }

    public function isDeliveredMsg(): ?bool
    {
        return $this->isDeliveredMsg;
    }

    public function setIsDeliveredMsg(bool $isDeliveredMsg): self
    {
        $this->isDeliveredMsg = $isDeliveredMsg;
        return $this;
    }

    public function getCreatedAtMsg(): ?\DateTimeInterface
    {
        return $this->createdAtMsg;
    }

    public function setCreatedAtMsg(\DateTimeInterface $createdAtMsg): self
    {
        $this->createdAtMsg = $createdAtMsg;
        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;
        return $this;
    }

    // NEW getter and setter for Goal relationship
    public function getGoal(): ?Goal
    {
        return $this->goal;
    }

    public function setGoal(?Goal $goal): self
    {
        $this->goal = $goal;
        return $this;
    }

    public function getParentMessageId(): ?int
    {
        return $this->parentMessageId;
    }

    public function setParentMessageId(?int $parentMessageId): self
    {
        $this->parentMessageId = $parentMessageId;
        return $this;
    }

    // Helper methods
    public function getTypeLabel(): string
    {
        return match($this->messageTypeG) {
            self::TYPE_TO_FUTURE => 'Letter to Future Self',
            self::TYPE_TO_PAST => 'Letter to Past Self',
            self::TYPE_REFLECTION => 'Reflection',
            default => 'Message'
        };
    }

    public function getIcon(): string
    {
        return match($this->messageTypeG) {
            self::TYPE_TO_FUTURE => 'future',
            self::TYPE_TO_PAST => 'past',
            self::TYPE_REFLECTION => 'reflection',
            default => 'message'
        };
    }

    public function isReadyForDelivery(): bool
    {
        if (!$this->deliveryDateMsg || $this->messageTypeG !== self::TYPE_TO_FUTURE) {
            return false;
        }
        
        $now = new \DateTime();
        return !$this->isDeliveredMsg && $this->deliveryDateMsg <= $now;
    }

    public function markAsDelivered(): self
    {
        $this->isDeliveredMsg = true;
        return $this;
    }

    public function getDaysUntilDelivery(): ?int
    {
        if (!$this->deliveryDateMsg || $this->isDeliveredMsg || $this->messageTypeG !== self::TYPE_TO_FUTURE) {
            return null;
        }
        
        $now = new \DateTime();
        $interval = $now->diff($this->deliveryDateMsg);
        
        return $interval->days * ($interval->invert ? -1 : 1);
    }

    // Helper method to get goal ID easily
    public function getGoalId(): ?int
    {
        return $this->goal ? $this->goal->getIdGoa() : null;
    }
}

