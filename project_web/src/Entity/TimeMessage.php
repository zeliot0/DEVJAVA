<?php

namespace App\Entity;

use App\Repository\TimeMessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TimeMessageRepository::class)]
#[ORM\Table(name: 'time_message')]
class TimeMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_time_message', type: 'integer')]
    private ?int $idTimeMessage = null;

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

    #[ORM\Column(name: 'is_delivered_msg', type: 'boolean')]
    private ?bool $isDeliveredMsg = false;

    #[ORM\Column(name: 'created_at_msg', type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAtMsg = null;

    #[ORM\Column(name: 'id_user', type: 'integer')]
    private ?int $idUser = null;

    #[ORM\Column(name: 'parent_message_id', type: 'integer', nullable: true)]
    private ?int $parentMessageId = null;

    #[ORM\Column(name: 'id_g', type: 'integer', nullable: true)]
    private ?int $idG = null;

    public function __construct()
    {
        $this->createdAtMsg = new \DateTime();
    }

    public function getIdTimeMessage(): ?int
    {
        return $this->idTimeMessage;
    }

    public function getTitleMsg(): ?string
    {
        return $this->titleMsg;
    }

    public function getMessageTypeG(): ?string
    {
        return $this->messageTypeG;
    }

    public function getContentMsg(): ?string
    {
        return $this->contentMsg;
    }

    public function getVideoPathMsg(): ?string
    {
        return $this->videoPathMsg;
    }

    public function getDeliveryDateMsg(): ?\DateTime
    {
        return $this->deliveryDateMsg;
    }
    public function isIsDeliveredMsg(): ?bool { return $this->isDeliveredMsg; }

    public function getCreatedAtMsg(): ?\DateTime
    {
        return $this->createdAtMsg;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getParentMessageId(): ?int
    {
        return $this->parentMessageId;
    }

    public function getIdG(): ?int
    {
        return $this->idG;
    }

    public function setTitleMsg(string $titleMsg): static
    {
        $this->titleMsg = $titleMsg;

        return $this;
    }

    public function setMessageTypeG(string $messageTypeG): static
    {
        $this->messageTypeG = $messageTypeG;

        return $this;
    }

    public function setContentMsg(string $contentMsg): static
    {
        $this->contentMsg = $contentMsg;

        return $this;
    }

    public function setVideoPathMsg(?string $videoPathMsg): static
    {
        $this->videoPathMsg = $videoPathMsg;

        return $this;
    }

    public function setDeliveryDateMsg(?\DateTime $deliveryDateMsg): static
    {
        $this->deliveryDateMsg = $deliveryDateMsg;

        return $this;
    }

    public function setIsDeliveredMsg(bool $isDeliveredMsg): static
    {
        $this->isDeliveredMsg = $isDeliveredMsg;

        return $this;
    }

    public function setCreatedAtMsg(\DateTime $createdAtMsg): static
    {
        $this->createdAtMsg = $createdAtMsg;

        return $this;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function setParentMessageId(?int $parentMessageId): static
    {
        $this->parentMessageId = $parentMessageId;

        return $this;
    }

    public function setIdG(?int $idG): static
    {
        $this->idG = $idG;

        return $this;
    }

    public function isDeliveredMsg(): ?bool
    {
        return $this->isDeliveredMsg;
    }
}